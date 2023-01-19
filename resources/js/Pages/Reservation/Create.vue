<template>
    <div
        class="w-full bg-slate-50 shadow-xl shadow-teal-300 py-10 px-20 items-center"
    >
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
                        v-model="this.date"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"
                        min="{{ new Date().toISOString().substr(0, 10) }}"
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
                        v-model="this.time"
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
                v-model="this.duration"
                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"
            />
        </div>

        <div class="relative w-full lg:mt-0 mt-6" role="list">
            <div
                role="listitem"
                class="bg-gray-100 cursor-pointer rounded-lg mt-3 flex relative shadow-lg hover:shadow-xl"
            >
                <div
                    class="w-2.5 h-auto bg-teal-600 rounded-tl-md rounded-bl-md"
                ></div>
                <div class="w-full px-8 py-2">
                    <div class="md:flex items-center justify-between">
                        <h2
                            class="text-xl font-semibold leading-6 text-gray-800"
                        >
                            {{ new Date(this.date).toDateString() }}
                            {{ this.time }}
                            <!-- Convert date into standard format -->
                        </h2>
                        <p
                            class="text-xl md:mt-0 mt-4 leading-6 text-lg font-bold text-teal-600"
                        >
                            <span class="text-base">RM {{ total }}</span>
                        </p>
                    </div>
                    <p class="md:w-80 text-base leading-6 text-gray-600">
                        {{ this.time }} - {{ endTime }}
                    </p>
                    <p class="md:w-80 text-base leading-6 text-gray-600">
                        {{ this.duration }} hours
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: {
        facility: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            date: new Date().toISOString().substr(0, 10),
            time: new Date().toISOString().substr(11, 5),
            duration: null,
        };
    },
    computed: {
        total() {
            // Limit it to 2 decimal places
            return (this.facility.rate_per_hour * this.duration).toFixed(2);
        },
        endTime() {
            // parse time and add on the amount of duration in hours into the time
            const time = new Date("1970-01-01T" + this.time + "Z").getTime();
            const endTime = new Date(time + this.duration * 60 * 60 * 1000);
            return endTime.toISOString().substr(11, 5);
        },
    },
});
</script>
