<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Student</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name:"StudentAdd",
    data(){
        return {
            student:{
                name:"",
                roll_number:"",
                class:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/students', this.student).then(response=>{
                this.$router.push({name:"student-list"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>