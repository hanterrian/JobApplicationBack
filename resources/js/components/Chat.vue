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

        Echo.private('chat.' + this.$props.chat_id)
            .listen('ChatSender', (data) => {
                console.log(data);
                this.messages.push(data.message);
            });

        Echo.join('online-chat.' + this.$props.chat_id)
            .here(users => (console.log(users)))
            .joining(user => {
                console.log('Join');
                console.log(user);
            })
            .leaving(user => {
                console.log('Leave');
                console.log(user);
            });
    },
    data() {
        return {
            message: null,
            messages: [],
        };
    },
    methods: {
        send() {
            axios
                .post('/messages', {
                    chat: this.$props.chat_id,
                    message: this.message,
                })
                .then(response => this.messages.push(response.data.data))
                .catch(error => console.log(error));
        },
    },
};
</script>
