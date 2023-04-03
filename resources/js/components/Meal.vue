<template>
    <div class="container">
        <div class="section" style="margin-top:150px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Calories Calculator</h4>
                        <a class="float-end">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-2 mb-2">
                                <label for="inputName5" class="form-label">Choose Meal</label>
                                <select class="form-select">
                                    <option value="Male" selected="">Breakfast</option>
                                    <option value="Female">Lunch</option>
                                    <option value="Female">Snack</option>
                                    <option value="Female">Dinner</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="inputName5" class="form-label">Food</label>
                                <select class="form-select">
                                    <option v-for="food in this.all_foods" v-bind:value="Male">{{ food.food_name }}</option>
                                    <option value="Female">Pcs</option>
                                </select>
                            </div>
                            <div class="col-md-1 mb-2">
                                <label for="inputName5" class="form-label">Unit</label>
                                <select class="form-select">
                                    <option value="Male" selected="">gm</option>
                                    <option value="Female">Pcs</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="inputEmail5" class="form-label">Amount</label>
                                <input type="text" v-model="food_amount" class="form-control" id="inputEmail5">
                            </div>
                            <div class="col-md-1 mb-2">
                                <label for="inputEmail5" class="form-label">Calories</label>
                                <input type="text" v-model="calories" class="form-control" id="inputEmail5">
                            </div>
                            <div class="col-md-1 mb-2">
                                <label for="inputEmail5" class="form-label">Carbs</label>
                                <input type="text" v-model="carbs" class="form-control" id="inputEmail5">
                            </div>
                            <div class="col-md-1 mb-2">
                                <label for="inputEmail5" class="form-label">Fat</label>
                                <input type="text" v-model="fat" class="form-control" id="inputEmail5">
                            </div>
                            <div class="col-md-1 mb-2">
                                <label for="inputEmail5" class="form-label">Protein</label>
                                <input type="text" v-model="protien" class="form-control" id="inputEmail5">
                            </div>
                            <div class="col-md-1 mb-2">
                                <label for="inputEmail5" class="form-label">Action</label><br>
                                <i class="fa fa-trash text-danger"></i>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button @click="calculate()" class="btn btn-primary float-end">Calculate</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props:[
    'foods'
    ],
    data(){
        return{
            all_foods: this.foods,
            food_amount:'',
            calories:'',
            carbs:'',
            fat:''
            
        }
    },
    methods:{
        async calculate(){
            const headers = { "X-Api-Key": "I3sov+4Ec2CrXQK9mauAQQ==PzCNNH5swQ7U6yde", "Content-Type": "application/json",'Access-Control-Allow-Origin': '*', };
            var query = '1lb brisket and fries'
            const res = await axios
            .get('https://api.api-ninjas.com/v1/nutrition?query='+query, {
                headers: {
                    'Access-Control-Allow-Credentials':'*',
                    "X-Api-Key": "teI3sov+4Ec2CrXQK9mauAQQ==PzCNNH5swQ7U6ydest1"
                }
            })
            .then(response => {
                console.log("Success: " + response.data);
            })
            .catch(error => {
                console.log("Error: " + error.response.data);
            });
            
            
        }
        // async calculate(){
        //     const res = await axios.get('getFoods')
        //     console.log(res.data)
        // }
    },
    mounted() {
        //alert(this.foods)
        console.log(this.foods[1].food_name)
    }
}
</script>
