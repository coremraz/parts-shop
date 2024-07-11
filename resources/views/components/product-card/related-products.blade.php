@props(['related'])

@foreach($related as $categoryIndex => $products)
    <h1><b>{{$categoryIndex}}:</b></h1>
    <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
            <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev-{{ $categoryIndex }}">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-7/12 h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider-{{ $categoryIndex }}" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                    @foreach($products as $product)

                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                            <a href="{{route('product', $product['id'])}}">
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-white">{{$product['name']}}</h3>
                                </div>
                            </a>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next-{{ $categoryIndex }}">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
@endforeach

<script>
    document.querySelectorAll('[id^="slider-"]').forEach(slider => {
        let defaultTransform = 0;
        let sliderId = slider.id;
        let next = document.getElementById("next-" + sliderId.split('-')[1]);
        let prev = document.getElementById("prev-" + sliderId.split('-')[1]);

        function goNext() {
            defaultTransform = defaultTransform - 398;
            if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        next.addEventListener("click", goNext);

        function goPrev() {
            if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
            else defaultTransform = defaultTransform + 398;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        prev.addEventListener("click", goPrev);
    });
</script>
