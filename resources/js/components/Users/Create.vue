<template>

    <div>
        <div class="title m-b-md"  style="height: 8vh;font-size: 35px;display: block;margin-left: 20px;margin-top: 20px;">
            Add User
        </div>
        <form  @submit.prevent="addNewUser()" >
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="title m-b-md"  style="height: 8vh;text-align: left;font-size: 35px;display: block;">
                       User details
                    </div>
                        <div class="row">
                            <div class="col">
                                <div class="title m-b-md"  style="height: 5vh;text-align: left;font-size: 20px;display: block;">
                                    General
                                </div>
                                <label for="">Date created:</label>
                                    <div class="row">
                                        <div class="col" style="width: 65%;float: left;">
                                                <input class="form-control" type="date" value="" id="example-date-input">
                                        </div>
                                        <label for="" style="font-size:20px;">@</label>
                                        <div class="col" style="width: 25%;float: right;">
                                                <input class="form-control" type="time" value="" id="example-time-input">
                                        </div>
                                    </div>
                            </div>

                            <div class="col">
                                <div class="title m-b-md"  style="height: 5vh;text-align: left;font-size: 20px;display: block;">
                                    Details
                                </div>
                                <div class="row">
                                    <div class="col" style="width: 50%;float: left;">
                                        <label for="">First name:</label>
                                        <input class="form-control" type="text"  id="example-text-input" v-model="user.name">
                                    </div>
                                </div>
                                <label for="">Email:</label>
                                <input class="form-control"  type="email"  id="exampleInputEmail1" v-model="user.email">
                                <label for="">Password:</label>
                                 <input  name="password" type="password" class="form-control" placeholder=""  v-model="user.password">
                                <!-- <input class="form-control" type="password" value="" id="exampleInputPassword1"> -->
                                <label for="">Confirmation:</label>
                                   <input  name="password_confirmation" type="password" class="form-control" placeholder="" v-model="user.password_confirmation" >
                                <!-- <input class="form-control" type="password" value="" id="exampleInputPassword1"> -->

                            </div>
                        </div>
                        <button type="submit"   class="btn btn-primary btn-sm" style="float: right;">Add Orders</button>
                        <!-- <button type="submit"  class="btn btn-primary btn-sm" style="float: right;" v-on:click="addNewUser()">Add Orders</button> -->
                        <!-- <input   value="Add Orders" v-on:click="addNewUser()" class="btn btn-primary btn-sm" style="float: right;"> -->
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</template>

<script>
export default {
    data(){
        return{
                users:[],
                user: {
                   name:'',
                   email:'',
                   password:'',
                   password_confirmation:''
               },
                user_id:'',
                edit: false
           }
    },

    //     created() {
    //     this.fetchUsers();
    // },

    methods: {
        addNewUser(){
            if (this.edit === false) {
                //Add
                fetch('http://127.0.0.1:8000/api/users', {
                        method: 'post',
                        body: JSON.stringify(this.user),
                        headers:{
                            'content-type': 'application/json'
                        }
                })
                 .then(res => res.json())
                 .then(data => {
                     alert('User Added');
                     window.location = '/user';
                 })
                 .catch(function(error) {
                    alert('Error Please Check That It Is Correct.');
                });
            }
        }
    },
}
</script>