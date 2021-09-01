<template>
    <div class="flex space-x-10 min-h-screen justify-center items-center bg-blue-500">
        <div>
        <h1 class="text-3xl font-extrabold mb-12 text-blue-100">Hello i am Message paage us page</h1>
        <div>
            <div v-for="(message,index) in messages" :key="index" class="bg-white p-8 mb-4 rounded shadow">
                {{message.text}}
            </div>
            
            <h2 class="text-3xl font-extrabold mb-12 text-blue-100">Please write messages</h2>
            
        
                <form @submit.prevent="submit">
                    <textarea v-model="form.text" cols="80" rows="5"></textarea>
                    <div v-if="errors.text" class="text-red-900">{{errors.text}}</div>
                    <button type="submit">Add Message</button>
                </form>
            
        </div>
       </div>
    </div>
</template>
<script>


export default {
    props:{
        messages : Array,
        errors :Object
    },
    data(){
        return {
            form: {text:' '}
        }
    },
    methods:{
        submit(){
            this.$inertia.post('/messages',this.form)
        }
    }
};
</script>
