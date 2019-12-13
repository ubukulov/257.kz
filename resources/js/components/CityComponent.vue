<template>
    <div class="select_city">
        <i class="fas fa-map-marker-alt"></i>

        <select v-model="selectedCity" @change="changeCity(selectedCity)">
            <option v-for="(c, index) in cities" :key="c.id" :value="c.id">{{ c.title }}</option>
        </select>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            cities: Array,
            city: Number
        },
        data(){
            return {
                selectedCity: this.city
            }
        },
        methods: {
            changeCity(city) {
                axios.post('/city/change', {
                    city_id: this.selectedCity
                })
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        }
    }
</script>