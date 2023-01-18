<script>
    import Nav from '../../mainnav.svelte';
</script>

<Nav />


<!-- component -->
<div class="px-3 md:lg:xl:px-40  bg-cover border-t border-b py-20 bg-opacity-10" style="background-image: url('../mainbg.jpg') ;">

    <article class="rounded-xl bg-white p-3 shadow-lg mb-4">
        <a href="#">
            <div class="relative flex items-end overflow-hidden rounded-xl max-h-[20rem]">
            <img src="https://www.ioicitymall.com.my/data/images/item/img_5814810_slide2.jpg" alt="Hotel Photo" />
            <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </div>
            </div>
    
            <div class="mt-1 p-2">
            <h2 class="text-slate-700">IOI City Mall</h2>
            <p class="mt-1 text-sm text-slate-400">IOI City, Putrajaya</p>
    
            <div class="mt-3 flex items-end justify-between">
                <p>
                <span class="text-lg font-bold text-teal-600">Badminton Court</span>
                </p>
            </div>
            </div>
        </a>
        </article>

    <div class="grid grid-cols-3 md:lg:xl:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border shadow-xl shadow-teal-300">



    </div>

    <div class="w-full bg-slate-50 shadow-xl shadow-teal-300 py-10 px-20 items-center">
        <!-- <p class=" text-white"> <span class="text-4xl font-medium">Still Confused ?</span> <br> <span class="text-lg">Book For Free Career Consultation Today ! </span></p>
        <button class="px-5 py-3  font-medium text-slate-700 shadow-xl  hover:bg-white duration-150  bg-yellow-400">BOOK AN APPOINTMENT </button> -->

        <h1 class="text-2xl font-medium mb-5">Choose your slot</h1>

        <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                    <label
                    for="date"
                    class="mb-3 block text-base font-medium text-teal-600"
                    >
                    Date
                    </label>
                    <input
                    type="date"
                    name="date"
                    id="date"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"
                    />
                </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                    <label
                    for="time"
                    class="mb-3 block text-base font-medium text-teal-600"
                    >
                    Time
                    </label>
                    <input
                    type="time"
                    name="time"
                    id="time"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:teal-600 focus:shadow-md"
                    />
                </div>
                </div>
            </div>

            <div class="mb-5">
                <label
                    for="duration"
                    class="mb-3 block text-base font-medium text-teal-600"
                    >
                    Select your duration (hours)
                    </label>
                    <input
                    type="number"
                    name="duration"
                    id="duration"
                    placeholder="1"
                    min="1"
                    max="4"
                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"
                    />
                </div>
        
            <div>
                <button
                class="hover:shadow-form rounded-md bg-teal-600 py-2 px-8 text-center text-base font-semibold text-white outline-none"
                >
                Search
                </button>
            </div>

        <div class="relative w-full lg:mt-0 mt-6" role="list">
            <div role="listitem" class="bg-gray-100 cursor-pointer rounded-lg mt-3 flex relative shadow-lg hover:shadow-xl">
                <div class="w-2.5 h-auto bg-teal-600 rounded-tl-md rounded-bl-md"></div>
                <div class="w-full px-8 py-2">
                    <div class="md:flex items-center justify-between">
                        <h2 class="text-xl font-semibold leading-6 text-gray-800">9 P.M</h2>
                        <p class="text-xl md:mt-0 mt-4 leading-6 text-lg font-bold text-teal-600"><span class="text-base">RM 60</span></p>
                    </div>
                    <p class="md:w-80 text-base leading-6 mt-2 text-gray-600">A5</p>
                    <p class="md:w-80 text-base leading-6 text-gray-600">2 hours</p>
                </div>
            </div>

            <div role="listitem" class="bg-gray-100 cursor-pointer rounded-lg mt-3 flex relative shadow-lg hover:shadow-xl">
                <div class="w-2.5 h-auto bg-teal-600 rounded-tl-md rounded-bl-md"></div>
                <div class="w-full px-8 py-2">
                    <div class="md:flex items-center justify-between">
                        <h2 class="text-xl font-semibold leading-6 text-gray-800">10 P.M</h2>
                        <p class="text-xl md:mt-0 mt-4 leading-6 text-lg font-bold text-teal-600"><span class="text-base">RM 60</span></p>
                    </div>
                    <p class="md:w-80 text-base leading-6 mt-2 text-gray-600">B4</p>
                    <p class="md:w-80 text-base leading-6 text-gray-600">2 hours</p>
                </div>
            </div>

            <div role="listitem" class="bg-gray-100 cursor-pointer rounded-lg mt-3 flex relative shadow-lg hover:shadow-xl">
                <div class="w-2.5 h-auto bg-teal-600 rounded-tl-md rounded-bl-md"></div>
                <div class="w-full px-8 py-2">
                    <div class="md:flex items-center justify-between">
                        <h2 class="text-xl font-semibold leading-6 text-gray-800">9 P.M</h2>
                        <p class="text-xl md:mt-0 mt-4 leading-6 text-lg font-bold text-teal-600"><span class="text-base">RM 60</span></p>
                    </div>
                    <p class="md:w-80 text-base leading-6 mt-2 text-gray-600">C2</p>
                    <p class="md:w-80 text-base leading-6 text-gray-600">2 hours</p>
                </div>
            </div>
        </div>

    </div>

</div>