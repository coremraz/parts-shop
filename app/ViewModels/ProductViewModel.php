<?php

namespace App\ViewModels;

use App\Models\Delivery_method;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_kind;

class ProductViewModel
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getKind(): Product_kind
    {
        return $this->product->kinds()->first();
    }

    public function getAnalogies(): array
    {
        // Аналоги товара
        $analogies = [];

        // Получаем аналоги товара с предзагрузкой вендора
        foreach ($this->product->analogies()->with('vendor')->get() as $analog) {
            // Если есть имя или артикул и вендор опубликован
            if (($analog->name || $analog->article) && $analog->vendor->published) {
                // Формируем строку "название (артикул)" или просто название/артикул, если чего-то нет
                $analogies[$analog->vendor->name] = $analog->name
                    ? ($analog->article ? "$analog->name ($analog->article)" : $analog->name)
                    : $analog->article;
            }
        }
        return $analogies;
    }

    public function getKindProps()
    {
        // Получаем свойства вида товара с предзагрузкой значений
        return $this->getKind()->props()->with('values')->get()->sortBy('sorting');
    }

    public function getRelatedProducts(): array
    {
        // Массив связанных товаров
        $related = [];
        // Получаем типы связанных товаров с предзагрузкой связанных продуктов и их основных продуктов
        foreach ($this->getKind()->relatedTypes()->with('relatedProducts.product')->get() as $type) {
            // Проходимся по связанным продуктам
            foreach ($type->relatedProducts as $relatedProduct) {
                // Добавляем в массив название и ID связанного продукта
                $related[$type->name][] = [
                    "name" => $relatedProduct->product()->first()->title,
                    "id" => $relatedProduct->product()->first()->id
                ];
            }
        }
        return $related;
    }

    public function getCharacteristics(): array
    {
        // Массив характеристик
        $characteristics = [];
        // Проходимся по свойствам вида товара
        foreach ($this->getKindProps() as $kind_prop) {
            // Если секция не равна 0, добавляем название секции
            if ($kind_prop->section != 0) {
                $characteristics["<b>" . $kind_prop->name . "</b>"] = "";
                // Иначе, если значение свойства существует, добавляем название свойства и его значение
            } else if ($kind_prop->values->first()?->value) {
                $characteristics[$kind_prop->name] = ": " . $kind_prop->values->first()->value;
            }
        }
        return $characteristics;
    }

    public function getPrice(): string
    {
        // Что выводить в цене
        if ($this->product->special_price) {
            return $this->product->special_price . " ₽";
        } else if (!$this->product->special_price && !$this->product->price) {
            return "По запросу";
        } else {
            return $this->product->price . " ₽";
        }
    }

    public function getExpectedDeliveries($id) :int
    {
        $orders = Order::all()->where("received", 0);
        $quantity = 0;

        foreach ($orders as $order) {
            $details = $order->details()->where('product_id', $id)->get();

            foreach ($details as $detail) {
                $quantity += $detail->quantity;
            }
        }

        return $quantity;
    }

    public function getStock(): string
    {
             // Получаем вендора
            $deliveryTime = $this->product->vendor()->first()->delivery_time;
            if ($this->product->stock > 0) {
                if ($this->getExpectedDeliveries($this->product->id)) {
                    return "В наличии: " . $this->product->stock . " шт. (" . $this->getExpectedDeliveries($this->product->id) ."шт. ожидается)";
                } else {
                    return "В наличии: " . $this->product->stock . " шт.";
                }

            } elseif ($this->product->stock <= 0) {
                if ($this->getExpectedDeliveries($this->product->id)) {
                    return "Ожидается: " . $this->product->stock + $this->getExpectedDeliveries($this->product->id);
                } else {
                    return "Нет в наличии. Срок поставки: " . $deliveryTime;
                }
            }
    }


    public function getLogo(): string
    {
        // Получаем вендора
        $vendor = $this->product->vendor()->first();
        // Если логотип существует, возвращаем тег img, иначе - название вендора
        return $vendor->logo
            ? "<img src='$vendor->logo' alt='brand logo'/>"
            : $vendor->name;
    }

    public function getBrandInfo(): array
    {
        // Информация о бренде
        $vendor = $this->product->vendor()->first();
        return [
            "name" => $vendor->name,
            "logo" => $vendor->logo,
            "country" => $vendor->country,
            "warranty" => $vendor->warranty,
        ];
    }

    public function getDeliveryMethods()
    {
        // Возвращаем все способы доставки
        return Delivery_method::all();
    }

    public function getCatalogTree(): array
    {
        // Дерево каталога
        $category = $this->product->category()->first();
        $catalogTree = $this->getProductCategoryTree($category);
        $catalogTree[] = $this->product->title;
        return $catalogTree;
    }

    public function getPackageInfo(): array
    {
        // Информация об упаковке
        return [
            'length' => $this->product->length,
            'width' => $this->product->width,
            'height' => $this->product->height,
            'weight' => $this->product->weight,
        ];
    }

    public function getComplectation(): ?array
    {
        // Комплектация
        // Если у товара не заполнена комплектация, возвращаем null
        if ($this->product->composite_product == 0 || !$this->getKind()->compositeElements()->exists()) {
            return null;
        }

        $complectation = [];
        // Получаем элементы комплектации с предзагрузкой связанных продуктов
        foreach ($this->getKind()->compositeElements()->with('elements.product')->get()->sortBy('sorting') as $element) {
            if ($this->getKind()->compositeElements()->with('elements.product')->get()) {
                if ($element->elements->where('product_id', $this->product->id)->first()) {
                    $complectation[$element->element] = $element->elements->where('product_id', $this->product->id)->first()->product->title . " (" . $element->elements->first()->product->article . ")";
                }

            }
        }

        return $complectation;
    }

    private function getProductCategoryTree($category): array
    {
        // Рекурсивный метод для получения дерева категорий
        $categoryIds = [];

        // Добавляем текущую категорию
        $categoryIds[$category->name] = $category->name;

        // Если у категории есть родительская категория, рекурсивно вызываем этот метод
        if ($category->parentCategory()->first() != null) {
            $tempCategory = $category->parentCategory()->first();
            $categoryIds = array_merge($this->getProductCategoryTree($tempCategory), $categoryIds);
            // Иначе добавляем корневые элементы
        } else {
            $categoryIds = array_merge(['Главная' => 'Главная', 'Каталог товаров' => 'Каталог товаров'], $categoryIds);
        }

        return $categoryIds;
    }
}
