<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"student-add"}' class="btn btn-primary">Add</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Students List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="students.length > 0">
                                <tr v-for="(student, key) in students" :key="key">
                                    <td>{{ student.roll_number }}</td>
                                    <td>{{ student.name }}</td>
                                    <td>{{ student.class }}</td>
                                    <td>
                                        <router-link :to='{name:"student-edit", params:{id:student.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteStudent(student.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Data Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentList",
    data(){
        return {
            students:[]
        }
    },
    mounted(){
        this.getStudents()
    },
    methods:{
        async getStudents(){
            await this.axios.get('/api/students').then(response=>{
                this.students = response.data.students
            }).catch(error=>{
                console.log(error)
                this.students = []
            })
        },
        deleteStudent(id){
            if(confirm("Are you sure to delete this Student ?")){
                this.axios.delete(`/api/students/${id}`).then(response=>{
                    this.getStudents()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>