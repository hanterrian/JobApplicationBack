require('./bootstrap');

import {createApp} from 'vue';

import Chat from './components/Chat.vue';

createApp(Chat, {
    chat_id: $('#chat').data('chat-id'),
}).mount('#chat');
