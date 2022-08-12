<template>

    <div>
        <input type="text" v-model="keyword">
        <ul v-if="Series.length > 0">
            <li v-for="search in Series":key="search.id" v-text="search.series_name"></li>
        </ul>
    </div>

</template>



<script>
export default {
    data(){
        return{
            keyword:null,
            Series:[]
        };
    },
    watch:{
        keyword(after,before){
            this.getResults();
        }
    },
    methods:{
        getResults(){
            axios.get('/livesearch',{params:{
                keyword:this.keyword
                }}).then(res=>
            this.Series = res.data).catch(error =>
            {});
        }
    }
}
</script>
