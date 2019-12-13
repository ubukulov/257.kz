<template>
    <div>
        <div class="select_currency">
            <select v-model="selectedCurr" @change="changeCurrency(selectedCurr)">
                <option v-for="(cur, i) in currencies" :key="i" :value="i">{{ cur.toUpperCase() }}</option>
            </select>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        props: {
            currency: Number,
            currencies: Array
        },
        data(){
            return {
                selectedCurr: this.currency
            }
        },
        methods: {
            changeCurrency(currency){
                axios.post('/currency/change', {
                    curr: this.selectedCurr
                })
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        created(){
//            console.log("Cur", this.currency);
        }
    }
</script>