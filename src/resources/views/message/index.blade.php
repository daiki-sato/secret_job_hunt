{{-- <div id="message" class="message">
        <div class="wrapper">
            <div v-for="message in thread.messages" :key="message.id">
                <div class="message_area">
                    <div class="date_area" :class="{ employee: isEmployee }">
                        <img v-if="!isEmployee" src="" alt="" />
                        <p class="message_date" v-text="2022/11/11"></p>
                        <img v-if="isEmployee" src="" alt="" />
                    </div>
                    <div class="message_box">
                        <p v-if="message.message" v-text="message.message"></p>
                    </div>
                    <p class="read">read</p>
                </div>
            </div>
            <textarea id="messageTextarea" v-model="sendMessage" class="textarea" name="message" cols="30" rows="10"
            @input="checkInput"></textarea>
        </div>
    </div> --}}
@extends('layouts.app')

@section('content')
    <style>
        .message {
            z-index: 3;
            height: 100%;
            width: 100%;
            margin: auto;
        }

        .textarea {
            padding: 12px;
            font-size: 12px;
            line-height: 18px;
            width: 100%;
            height: 120px;
            border-color: #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .wrapper {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            padding: 70px 20px;
        }

        .message_date {
            font-size: 12px;
            color: #333333;
        }

        .date_area {
            display: flex;
            gap: 6px;
            align-items: center;
            margin-bottom: 6px;
        }

        .message_box {
            padding: 12px;
            font-size: 12px;
            line-height: 18px;
            border-radius: 6px;
            margin-bottom: 15px;
            white-space: pre-line;
            word-wrap: break-word;
        }

        .employee_box {
            margin-left: 20px;
            background-color: #6ea5ff;
            color: #fff;
        }

        .consultant_box {
            margin-right: 20px;
            background-color: #f5f5f5;
        }

    </style>
    {{-- <div id="chat" class="message">
        <div class="wrapper">
            <div class="message_area">
                <div v-for="message in messages">
                    <div class="date_area">
                        <span v-text="message.created_at"></span>：&nbsp;
                    </div>
                    <div class="message_box" :class="message.sender_id == 2  ? 'employee_box' : 'consultant_box'">
                        <span v-text="message.message"></span>
                    </div>
                </div>
            </div>
            <textarea v-model="message" class="textarea"></textarea>
            <button type="button" @click="send()">送信</button>
        </div>
    </div> --}}
    <div id="message"></div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
        new Vue({
            el: '#chat',
            data: {
                message: '',
                messages: []
            },
            // updated() {
            //     this.$el.scrollTop = this.$el.scrollHeight
            // },
            // computed: {
            //     isInterviewee() {
            //         return this.message.sender_id == 2
            //     },
            // },
            methods: {
                getMessages() {
                    const url = 'message/get';
                    axios.get(url)
                        .then((response) => {
                            this.messages = response.data;
                        });

                },
                send() {
                    const url = 'message/post';
                    const params = {
                        message: this.message
                    };
                    axios.post(url, params)
                        .then((response) => {
                            // 成功したらメッセージをクリア
                            this.message = '';
                            this.getMessages(); // メッセージを再読込
                        });
                },
            },
            mounted() {
                this.getMessages();
            }
        });
    </script>
@endsection
