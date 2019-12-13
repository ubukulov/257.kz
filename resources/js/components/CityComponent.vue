<template>
    <div class="select_city">
        <div class="sc_left_div">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="sc_right_div">
            <select class="form-control" v-model="selectedCity" @change="changeCity(selectedCity)">
                <option v-for="(city, index) in cities" :key="city.id" :value="city.id">{{ city.title }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'cities'
        ],
        data(){
            return {
                selectedCity: 1
            }
        },
        methods: {
            changeCity(city) {
                this.$emit('changeCity', city);
            }
        }
    }
</script>