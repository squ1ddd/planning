<template>
    <div style="display: flex; justify-content: center;">
        <button @click="changeDate('dblprevious')"><img src="../images/double-left-arrow.png" alt="dblprevious"></button>
        <button @click="changeDate('previous')"><img src="../images/left-arrow.png" alt="previous"></button>
        <p>{{ selectedDate }}</p>
        <button @click="changeDate('next')"><img src="../images/right-arrow.png" alt="next"></button>
        <button @click="changeDate('dblnext')"><img src="../images/double-right-arrow.png" alt="dblnext"></button>
    </div>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="week">
                <div class="dayBox">Monday</div>
                <div class="dayBox">Tuesday</div>
                <div class="dayBox">Wednesday</div>
                <div class="dayBox">Thursday</div>
                <div class="dayBox">Friday</div>
                <div class="dayBox">Saturday</div>
                <div class="dayBox">Sunday</div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
export default {
    data() {
        return {
            selectedDate: null,
            currentEntireDate: null
        }
    },
    methods: {
        convertIndexToDay(index) {
            switch(index) {
                case 1 :
                    return 'Monday'
                case 2 :
                    return 'Tuesday'
                case 3 :
                    return 'Wednesday'
                case 4 :
                    return 'Thursday'
                case 5 :
                    return 'Friday'
                case 6 :
                    return 'Saturday'
                case 0 :
                    return 'Sunday'
                default :
                    return ''
            }
        },
        changeDate(value) {
            let listDate = new Array()
            listDate = this.selectedDate.split('-')
            let newDate = new Date(listDate[0], listDate[1] - 1, listDate[2])
            switch(value) {
                case 'previous' :
                    newDate.setDate(newDate.getDate() - 1)
                    break
                case 'dblprevious' :
                    newDate.setDate(newDate.getDate() - 7)
                    break
                case 'next' :
                    newDate.setDate(newDate.getDate() + 1)
                    break
                case 'dblnext' :
                    newDate.setDate(newDate.getDate() + 7)
                    break
                default :
                    break
            }
            this.currentEntireDate = this.convertIndexToDay(moment(newDate).day())
            console.log(this.currentEntireDate)
            this.selectedDate = moment(newDate).format('YYYY-MM-DD')
        }
    },
    created() {
        fetch('/api/getCurrentDate')
            .then(response => response.json())
            .then(data => this.selectedDate = data)
    }
}
</script>
<style>
.container {
    display: flex;
}
.left {
    flex: 0 0 300px;
}
.right {
    flex: 1;
    margin-left: 10px;
}
.week {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    grid-gap: 10px;
    height: 85vh;
}
.dayBox {
    background-color: antiquewhite;
    margin: 10px;
    padding: 10px;
    height: 100%;
}

button img {
    width: 30%;
    mix-blend-mode: color-burn;
}
button :hover {
    transform: scale(1.5);
}
button {
    width: 3%;
    aspect-ratio: 1;
    object-fit: contain;
    background-color: transparent;
    border: none;
}
</style>