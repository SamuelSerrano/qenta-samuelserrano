<template>

                <div class="card">
                    <div class="card-header">
                        <div class="container" v-if="editMode">
                            <div class="row">
                            <div class="col-sm"><input type="text" class="form-control" placeholder="Nombre" v-model="player.first_name"></div>
                            <div class="col-sm"><input type="text" class="form-control" placeholder="Apellido" v-model="player.last_name"></div>
                            </div>
                        </div>
                        <p v-else>{{player.first_name}} <strong>{{player.last_name}}</strong> </p>
                        
                    </div>

                    <div class="card-body">
                        <h4>{{player.team.full_name}}</h4>
                    </div>
                    <div class="card-footer">
                        <button v-if="editMode" type="button" class="btn btn-secondary" v-on:click="onClickGuardar()">Guardar</button>
                        <button v-else type="button" class="btn btn-secondary" v-on:click="onClickUpdate()">Edit</button>
                        <button type="button" class="btn btn-primary" v-on:click="onClickDetail()">Mas Info</button>  
                    </div>
                </div>
</template>

<script>
    export default {
        props:['player'],
        data(){
            return{
                editMode:false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            onClickUpdate(){
                this.editMode=true;
            },
            onClickGuardar(){
                this.editMode=false;
            this.$emit('update',this.player);
            },
            onClickDetail(){
                this.editMode=false;
            this.$emit('moreinfo',this.player.id);
            }
            
            
        }
    }
</script>
