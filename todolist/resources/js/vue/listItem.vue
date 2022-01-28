<template>
<div class="item">
    <input type="checkbox" @click="updateCheck()" v-model="item.completed" >
    <span :class="[item.completed ? 'completed' : '', 'itemText' ]" >{{item.name}}</span>
    <button @click="removeItem()" class="trashcan">Delete</button>
</div>
</template>


<script>
export default{
    props : ['item'],
    methods:{
        updateCheck(){
            axios.put('api/item/'+this.item.id,{
                item : this.item
            })
            .then(response=>{
                if(response===200){
                    this.$emit('itemchanged');
                }
            })
            .catch(error=>{
                console.log(error);
            })
        }
    }
};
</script>

<style scoped>
.completed{
    text-decoration: line-through;
    color: #999999;
}
.itemText{
    width: 100%;
    margin-left: 20px;
}
.item{
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.trashcan{
    background : #e6e6e6;
    border:none;
    color:red;
    outline: none;

}
</style>