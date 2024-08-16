<?php

namespace App\Console\Commands;

use App\Events\ProductStockUpdated;
use Illuminate\Console\Command;
use App\Models\Product;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UpdateProductStock extends Command
{
    /**
     * Имя и сигнатура консольной команды.
     *
     * @var string
     */
    protected $signature = 'products:update-stock';

    /**
     * Описание консольной команды.
     *
     * @var string
     */
    protected $description = 'Обновление остатков товаров из файла Excel';

    /**
     * Путь к файлу отчета.
     *
     * @var string
     */
    protected $reportFilePath;

    /**
     * Время последнего успешного обновления остатков.
     *
     * @var int
     */
    protected $lastSuccessfulUpdateTime = 0;

    /**
     * Создать новый экземпляр команды.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->lastSuccessfulUpdateTime = $this->loadLastSuccessfulUpdateTime();
        $this->reportFilePath = base_path('storage/app/protected/Ostatki tovarov.xlsx');
    }

    /**
     * Выполнить консольную команду.
     *
     * @return int
     */
    public function handle()
    {
        // Получаем время изменения файла
        $fileModificationTime = filemtime($this->reportFilePath);

        // Проверяем, был ли файл изменен ПОСЛЕ последнего успешного обновления
        if ($fileModificationTime > $this->lastSuccessfulUpdateTime) {
            $this->info('Файл отчета изменен. Обновляем остатки товаров...');

            try {
                $spreadsheet = IOFactory::load($this->reportFilePath);
                $worksheet = $spreadsheet->getActiveSheet();

                // Создаем массив для хранения артикулов обновленных товаров
                $updatedProductArticles = [];

                // Начинаем обработку с 8 строки, пропуская заголовки и суммарную строку
                foreach ($worksheet->getRowIterator(8) as $row) {
                    $columnIndex = 1; // Индекс колонки 'A'
                    $cellValues = [];

                    // Определяем последнюю колонку в строке
                    $lastColumn = $worksheet->getHighestColumn($row->getRowIndex());
                    $lastColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($lastColumn);

                    // Считываем значения ячеек в строке
                    while ($columnIndex <= $lastColumnIndex) {
                        // Формируем адрес ячейки
                        $cellAddress = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex) . $row->getRowIndex();

                        // Получаем ячейку по адресу
                        $cell = $worksheet->getCell($cellAddress);
                        $cellValues[] = $cell->getValue();
                        $columnIndex++;
                    }

                    // Проверяем, не дошли ли мы до пустой строки
                    if (empty(array_filter($cellValues))) {
                        break;
                    }

                    [$title, , $article, $stock] = $cellValues;

                    // Ищем товар по артикулу, если он есть
                    $product = Product::where('article', $article)
                        ->where('composite_product', 0)
                        ->first();

                    // Если товар не найден по артикулу, ищем по наименованию
                    if (!$product) {
                        $product = Product::where('title', $title)
                            ->where('composite_product', 0)
                            ->first();
                    }

                    // Если товар найден, обновляем его остаток и добавляем артикул в массив
                    if ($product) {
                        $product->stock = (int)$stock;
                        $product->save();
                        $updatedProductArticles[] = $product->article;
                    }
                }

                // Сохраняем текущее время как время последнего успешного обновления
                $this->lastSuccessfulUpdateTime = time();
                $this->saveLastSuccessfulUpdateTime();
                $this->info('Остатки товаров успешно обновлены.');

                // Отправляем событие с массивом обновленных артикулов
                ProductStockUpdated::dispatch($updatedProductArticles);

            } catch (\Exception $e) {
                $this->error('Произошла ошибка при обновлении остатков: ' . $e->getMessage());
                return 1;
            }
        } else {
            $this->info('Файл отчета не изменился с момента последнего обновления. Обновление не требуется.');
        }

        return 0;
    }

    /**
     * Загружает время последнего успешного обновления из файла.
     *
     * @return int Время в секундах с начала эпохи Unix.
     */
    protected function loadLastSuccessfulUpdateTime(): int
    {
        $storageFile = storage_path('app/last_stock_update.txt');
        if (file_exists($storageFile)) {
            return (int)file_get_contents($storageFile);
        }

        return 0;
    }

    /**
     * Сохраняет время последнего успешного обновления в файл.
     *
     * @return void
     */
    protected function saveLastSuccessfulUpdateTime(): void
    {
        $storageFile = storage_path('app/last_stock_update.txt');
        file_put_contents($storageFile, $this->lastSuccessfulUpdateTime);
    }
}
