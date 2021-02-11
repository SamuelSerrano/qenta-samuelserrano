<style>
        .card-player{
            border-radius: 6px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.30);
            max-width: fit-content;
            padding: 10px 10px 0px;
        }
        .card-player  p{
            margin: 0px;
        }
        .card-player-header{
            border-bottom: 0.3px solid #c0c0c0;
            padding-bottom: 5px;
            width: 100%;
            margin: 0px 60px 10px 0px;
        }
        .card-player-header-title{
            text-transform: uppercase;
            color: #666;
        }
        .card-player-header-subtitle{
            font-size: 12px;
            color: #c0c0c0;
        }
        .card-player-body-team-name{
            font-size: 12px;
            color: #666;
            font-style: italic;
        }
        .card-player-body-team-conference{
            font-size: 12px;
            color: #333;
            font-weight: bolder;
        }
        .card-player-actions {
            text-align: right;
            padding: 5px 0px;
        }
        .card-player-actions > button{
            background-color: rgba(58, 48, 97, 0.9);
            color: #fff;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none;
            outline: none;
            font-style: italic;
            padding: 5px 10px;
            border-radius: 6px 0px;
        }
        @media only screen and (max-width: 768px) {
            .card-player{
                max-width: 90%;
                margin: 0 auto;
            }
        }
    </style>
<template>
    <div v-if='showall' class="row">
                <div class="panel panel-default">
                <div class="panel-heading">Filtro </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="first-name">Por nombre:</label>
                        <input type="text" class="form-control" name="first-name" placeholder="Buscar" v-model="nombrefiltro" > 
                    </div>
                </div>
            </div>
                <div class="col-md-8 col-md-offset-5">
            <player-component v-for="(player, index) in playersfilter" 
            :key="player.id" :player="player"
            @moreinfo="infoDetail(index, ...arguments)"
            @update="updatePlayer(index, ...arguments)">
            </player-component>
        </div>
    </div>
    <div  v-else class="card-player">
            <div class="card-player-header">
                <div class="card-player-header-title">
                    <p>{{playerdetail.first_name}} {{playerdetail.last_name}}</p>
                </div>
                <div class="card-player-header-subtitle">
                    <p>Position: {{playerdetail.position}}</p>
                </div>
                <div class="card-player-header-subtitle">
                    <p>Feet: {{playerdetail.height_feet}}</p>
                </div>
                <div class="card-player-header-subtitle">
                    <p>Inches: {{playerdetail.height_inches}}</p>
                </div>
                <div class="card-player-header-subtitle">
                    <p>Peso: {{playerdetail.weight_pounds}}</p>
                </div>
            </div>
            <div class="card-player-body">
                <div class="card-player-body-team">
                    <p class="card-player-body-team-name">{{playerdetail.team.full_name}} - <b>{{playerdetail.team.abbreviation}}</b></p>
                    <div class="card-player-header-subtitle">
                    <p>{{playerdetail.team.name}}</p>
                    </div>
                    <p class="card-player-body-team-conference">{{playerdetail.team.conference}}</p>
                    <div class="card-player-header-subtitle">
                    <p>Division: {{playerdetail.team.division}}</p>
                    </div>
                    <div class="card-player-header-subtitle">
                    <p>Ciudad: {{playerdetail.team.city}}</p>
                    </div>
                </div>
            </div>
            <div class="card-player-actions">
                <button v-on:click="returnList()">Volver</button>
            </div>
        </div>
</template>

<script>
export default {
        data()
        {
            return{
                players:[],
                nombrefiltro:'',
                playerdetail:'',
                showall:true
            }
        }, 
        mounted() {
            axios.get('/player').then((response)=>{
                this.players = response.data;
                
            });
            console.log('Component mounted.');
        },
        computed:{
            playersfilter: function(){
                var nombre = this.nombrefiltro;
                if(nombre === "") {
				return this.players;
                } else {
                    return this.players.filter(function(player) {
                        return player.first_name === nombre;
                    });
                }
            }
        },
        methods:{
            updatePlayer(index, p){
                this.players[index] = p;
            },
            infoDetail(index, p){
                axios.get('/details/'+p).then((response)=>{
                this.playerdetail = response.data;
                this.showall = false;
            });
            },
            returnList()
            {
                this.showall = true;
            }

        }
    }
</script>
