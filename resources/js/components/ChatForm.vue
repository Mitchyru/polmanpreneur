// resources/assets/js/components/ChatForm.vue

<template>
    <form>
        <select v-model="selected" name="to_user_id" @keyup.enter="sendMessage">
            <option :value="{ item }">{{ $nama }}</option>
        </select>
        <input
        id="btn-input"
        type="text"
        name="message"
        class="form-control input-sm"
        placeholder="Type your message here..."
        v-model="newMessage"
        @keyup.enter="sendMessage"
        />

        <span class="input-group-btn">
        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
            Send
        </button>
        </span>
    </form>
</template>

<script>
    export default {
    props: ["user"],
    props: ["item"],
    props: ["nama"],

    data() {
        return {
        selected: "{{ item }}",
        newMessage: "",
        };
    },

    methods: {
        sendMessage() {
        this.$emit("messagesent", {
            user: this.user,
            message: this.newMessage,
            to_user_id: this.selected,
        });
        this.selected = "{{ item }}";
        this.newMessage = "";
        },
    },
    };
</script>