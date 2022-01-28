<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo list</h2>
            <addItem />
        </div>
        <listView :items="items" v-on:reloadlist="getList()" />
    </div>
</template>


<script>
import addItem from './addItem.vue';
import listView from './listView.vue';
export default{
    components:{
        addItem,
        listView,
    },
    data : function(){
        return{
            items : [],
        }
    },
    methods:{
        getList(){
            axios.get('api/items')
            .then( response=>{
                this.items = response.data
            })
            .catch( errors=>{
                console.log(errors);
            });
        }
    },
    created(){
        this.getList();
    }
}
</script>

<style scoped>
.todoListContainer{
    width: 350px;
    margin : auto;
}
.heading{
    background: #e6e6e6;
    padding : 10px;
}
#tilte{
    text-align: center;
}
</style>