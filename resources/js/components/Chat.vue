<template>
    <div class="chat">Example chat
        <div class="alert" :class="message.owner ? 'alert-success' : 'alert-info'" v-for="message in messages" :key="message.id">
            <div class="chat_message">{{ message.message }}</div>
            <div class="chat_message_data">
                {{ message.create }}
            </div>
        </div>
        <div class="chat_text">
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" ref="message" class="form-control" v-model="message"></textarea>
            </div>
            <button type="button" class="btn btn-primary" @click="send">Submit</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['chat_id'],
    mounted() {
        axios.get('/messages?chat=' + this.$props.chat_id)
            .then(response => this.messages = response.data.data)
            .catch(error => console.log(error));
    },
    data() {
        return {
            message: null,
            messages: [],
        };
    },
    methods: {
        send() {
            axios.post('/messages', {
                chat: this.$props.chat_id,
                message: this.message,
            });
        },
    },
};
</script>
