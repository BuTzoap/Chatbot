<template>
<div>
    <a href="/user/create" class="btn btn-primary">Add User</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
            <th scope="col">Actions</th>
            </tr>
            <!-- <tr v-for="(user,index) in users.data" v-bind:key="user.id" > -->
            <tr v-for="user in users" v-bind:key="user.id">
                <!-- {{user}} -->
                <td>{{user.id}}</td>
                <td style="width: 20%;">{{user.name}}</td>
                <td style="width: 25%;">{{user.email}}</td>
                <td>{{user.created_at}}</td>
                <td>
                    <a :href="'/user/'+user.id+'/edit'" class="btn btn-primary">Edit</a>
                    <!-- <a href="่javascript:;" class="btn btn-danger" v-on:click="deleteUser(user.id,index)">Delete</a> -->
                    <!-- <button @click="editeUser(user.id)" class="btn btn-primary">Edit</button> -->
                    <button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        </thead>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
            <a class="page-link" href="#" aria-label="Previous" @click="fetchUsers(pagination.prev_page_url)">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#"> {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]">
            <a class="page-link" href="#" aria-label="Next" @click="fetchUsers(pagination.next_page_url)">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul>
    </nav>
</div>
</template>

<script>
    // export default {
    //     mounted() {
    //         this.getUserData();
    //     },
    //     methods:{
    //         getUserData(){
    //             // console.log("ดึงข้อมูล");
    //             axios.get('api/users').then(response => {
    //                 // console.log(response);
    //                 this.users=response.data.data;
    //             })
    //         },
    //         deleteUser(id,index){
    //             // console.log(id);
    //              axios.delete('http://127.0.0.1:8000/api/users/'+this.id).then(response => {
    //                 // console.log(response);
    //                 // this.users=response.data.data;
    //                 console.log(response)
    //                 this.users.splice(index,1);

    //         });
    //         }
    //     },
    //     data() {
    //         return {
    //             status:[],
    //             users:[{
    //                 id:0,
    //                 name:'',
    //                 email:'',
    //                 created_at:''
    //             },]
    //         }
    //     },
    // }
   export default {
       data() {
           return {
               users:[],
               user: {
                   id:'',
                   name:'',
                   email:'',
                   created_at:'',
               },
               user_id:'',
               pagination:{},
               edit: false
           }
       },

       created() {
           this.fetchUsers();
       },

       methods:{
         fetchUsers(page_url) {
            let vm = this;
            page_url = page_url || 'api/users';
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                this.users = res.data;
                console.log(this.users);
                vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
         },
         makePagination(meta, links){
             let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
             }

             this.pagination = pagination;
         },
         deleteUser(id) {
            //  console.log(id);
             if(confirm('Are You Sure?')) {
                 fetch('api/users/'+ id, {
                    method: 'delete',
                 })
                 .then(res => res.json())
                 .then(data => {
                     alert('User Removed');
                     this.fetchUsers();
                 })
                .catch(function(error) {
                    alert('Error Please Check That It Is Correct.');
                });
             }
         } 
       }
   }
</script>