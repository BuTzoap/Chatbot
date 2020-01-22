<template>

    <div>
        <div class="title m-b-md"  style="height: 8vh;font-size: 35px;display: block;margin-left: 20px;margin-top: 20px;">
            Edit Users
        </div>
        <form  name="frmMain"   @submit.prevent="addArticle">
        <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="title m-b-md"  style="height: 8vh;text-align: left;font-size: 35px;display: block;">
                       User details
                    </div>
                        <div class="row">
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
                                <input class="form-control" type="email"  id="exampleInputEmail1" v-model="user.email">
                            </div>
                        </div>
                        <button  class="btn btn-primary mb-2">Update</button>
                        <!-- <input type="submit"  value="Add Orders"  class="btn btn-primary btn-sm" style="float: right;"> -->
                        <!-- <button type="submit" class="btn btn-primary btn-sm" style="float: right;" v-no:click="updateUser()">Update</button> -->
                        
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</template>

<script>
export default {
    props:['id'],
    data(){
        return{
               users:[],
               user: {
                   id:'',
                   name:'',
                   email:'',
                   created_at:'',
               },
               user_id:'',
               edit: false
           }
       },
        created() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers() {
            fetch('http://127.0.0.1:8000/api/users/'+this.id)
                .then(res => res.json())
                .then(res => {
                    this.users = res.data;
                    this.edit = true;
                    this.user.name = this.users.name;
                    this.user.id = this.users.id;
                    this.user.user_id = this.users.id;
                    this.user.email = this.users.email;
                    // console.log(this.edit);
                    })
                    .catch(err => console.log(err));
                    
        },
        addArticle() {
            if (this.edit === false) {
                
            } 
            else {
                //Update
                fetch('http://127.0.0.1:8000/api/users', {
                method: 'put',
                body: JSON.stringify(this.user),
                headers: {
                    'content-type': 'application/json'
                }
                })
                .then(res => res.json())
                .then(data => {
                    alert('User Updated');
                    window.location = '/user';
                })
                 .catch(function(error) {
                    alert('Error Please Check That It Is Correct.');
                });
            }
        },
    },
}
</script>