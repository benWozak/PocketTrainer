<template>
    <v-layout wrap>
         <v-flex sm4 xs12 class="text-sm-left text-xs-center">
            <v-btn @click="back">
                <v-icon dark left>keyboard_arrow_left</v-icon>
                Prev
            </v-btn>
        </v-flex>
        <v-spacer><h2 class="text-center">Week {{ trainingCount }}</h2></v-spacer>
        <v-flex sm4 xs12 class="text-sm-right text-xs-center">
            <v-btn @click="next">
                Next
                <v-icon right dark>keyboard_arrow_right</v-icon>
            </v-btn>
        </v-flex>

        <v-flex xs12 class="mb-3">
            <v-sheet height="600">
                <v-calendar ref="calendar" 
                    :now="today" 
                    :value="today"
                    :end="end"
                    color="deep-orange accent-3"
                    v-model="today" 
                    v-resize="changeCalendar" 
                    :type="type">
                    <!-- the events at the top (all-day) -->
                    <template v-slot:dayHeader="{ date }">
                        <template v-for="event in eventsMap[date]">
                            <!-- all day events don't have time -->
                            <div v-if="!event.time" 
                                :key="event.title" 
                                class="my-event" 
                                @click="open(event)" 
                                v-html="event.title"></div>
                        </template>
                    </template>
                    <!-- the events at the bottom (timed) -->
                    <template v-slot:dayBody="{ date, timeToY, minutesToPixels }">
                        <template v-for="event in eventsMap[date]">
                            <!-- timed events -->
                            <div v-if="event.time"
                                :key="event.title"
                                :style="{ top: timeToY(event.time) + 'px', height: minutesToPixels(event.duration) + 'px' }"
                                class="my-event with-time"
                                @click="open(event)"
                                v-html="event.title"></div>
                        </template>
                    </template>
                </v-calendar>
            </v-sheet>
        </v-flex>
    </v-layout>
</template>
<script>
export default {
    data: () => ({
        windowSize: window.innerWidth,
        trainingCount: 1,
        type: 'week',
        start: '2019-01-01',
        end: '2019-01-06',
        today: Date.now(),
        events: []
    }),
    computed: {
        // convert the list of events into a map of lists keyed by date
        eventsMap () {
            const map = {}
            this.events.forEach(e => (map[e.date] = map[e.date] || []).push(e))
            return map
        }
    },
    mounted () {
        this.changeCalendar()
        this.$refs.calendar.scrollToTime('08:00')
    },
    methods: {
        open (event) {
            alert(event.title)
        },
        changeCalendar() {
            if(window.innerWidth <= 768) {
                return this.type = '4day'
            } else {
                return this.type = 'week'
            }
        },
        next() {
            this.$refs.calendar.next()
            this.trainingCount++
        },
        back() {
            this.$refs.calendar.prev()
            this.trainingCount--
        }
    }
}
</script>
<style lang="scss" scoped>
    .my-event {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        border-radius: 2px;
        background-color: #1867c0;
        color: #ffffff;
        border: 1px solid #1867c0;
        font-size: 12px;
        padding: 3px;
        cursor: pointer;
        margin-bottom: 1px;
        left: 4px;
        margin-right: 8px;
        position: relative;

        &.with-time {
            position: absolute;
            right: 4px;
            margin-right: 0px;
        }
    }
</style>