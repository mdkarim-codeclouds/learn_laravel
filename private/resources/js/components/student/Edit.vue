<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Student</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="student.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Roll Number</label>
                                    <input type="text" class="form-control" v-model="student.roll_number">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Class</label>
                                    <input type="text" class="form-control" v-model="student.class">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"StudentEdit",
    data(){
        return {
            student:{
                name:"",
                roll_number:"",
                class:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showStudent()
    },
    methods:{
        async showStudent(){
            await this.axios.get(`/api/students/${this.$route.params.id}`).then(response=>{
                this.student.name = response.data.student.name
                this.student.roll_number = response.data.student.roll_number
                this.student.class = response.data.student.class
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/students/${this.$route.params.id}`,this.student).then(response=>{
                this.$router.push({name:"student-list"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>