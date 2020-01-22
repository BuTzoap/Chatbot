<template>
<div>
    <div class="container clearfix">
        <div class="chat">
            <div class="chat-header clearfix">
                <div class="chat-about">
                    <div class="chat-with">Chat bot</div>
                </div>
            </div>
            
            <div class="chat-history" id="myDiv">
                <ul>
                <li v-for="(message, index) in messages" :key="index" :class="message.author">
                    <div class="message-data">
                    <span class="message-data-name" v-if="message.author == 'User'">{{ message.author}} <i class="fa fa-circle me"></i></span> 
                    <span class="message-data-name" v-if="message.author == 'Bot'"><i class="fa fa-circle me"></i> {{ message.author}}</span>
                    
                    </div>
                    <div class="message other-message ">
                    {{ message.text}}
                    </div>
                </li>
                </ul>
            </div>
            <div class="chat-message clearfix">
                <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3" v-model="message" @keyup.enter="sendMessage"></textarea>
                <button  @click="sendMessage">Send</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
        data() {
           return {
               message: '',
               messages: []
           }
        },
        methods: {
            sendMessage() {
                this.messages.push({
                    text: this.message,
                    author: 'User'
                })
                this.message = '';
                fetch('http://127.0.0.1:8000/api/chatbot', {
                        method: 'post',
                        body: JSON.stringify(this.messages)
                })
                 .then(res => res.json())
                 .then(data => {
                        this.messages.push({
                            text: data.message,
                            author: 'Bot'
                        })
                 })
                 .catch(function(error) {
                    alert('Error Please Check That It Is Correct.');
                });
        },
    }
}
</script>

<style scoped lang="scss">

.chat {
    background: #ffffff;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    color: #434651;
}
.chat .chat-header {
    padding: 20px;
    border-bottom: 2px solid #f4f3ef;
}
.chat .chat-header img {
  float: left;
}
.chat .chat-header .chat-about {
  float: left;
  padding-left: 10px;
  margin-top: 6px;
}
.chat .chat-header .chat-with {
  font-weight: bold;
  font-size: 16px;
}
.chat .chat-header .chat-num-messages {
  color: #92959E;
}
.chat .chat-header .fa-star {
  float: right;
  color: #D8DADF;
  font-size: 20px;
  margin-top: 12px;
}
.chat .chat-history {
  padding: 30px 30px 20px;
  border-bottom: 2px solid white;
  overflow-y: scroll;
  height: 575px;
}
.chat .chat-history .message-data {
  margin-bottom: 15px;
}
.chat .chat-history .message-data-time {
  color: #a8aab1;
  padding-left: 6px;
}
.chat .chat-history .message {
  color: white;
  padding: 5px 5px;
  line-height: 26px;
  font-size: 16px;
  border-radius: 7px;
  margin-bottom: 30px;
  width: auto;
  position: relative;
}

.chat .chat-history .User { 
    text-align: right;
    list-style-type: none;
    .message {
        float: right!important;
    }
    .other-message {
        background: #86BB71;
    }
    .other-message:after {
        left: 85%;
    }
    .message-data .message-data-name .me {
    color: #86bb70;
    }
}
.chat .chat-history .Bot {
    text-align: left;
    list-style-type: none;
    .other-message {
        background: #94C2ED;
    }
    .message {
        float: left!important;
    }
    .other-message:after {
    border-bottom-color: #94C2ED;
    left: 30%;
    }
    .message-data .message-data-name .me {
    color: #94C2ED;
    }
}
.chat .chat-message {
  padding: 10px;
}
.chat .chat-message textarea {
  width: 90%;
  border: none;
  padding: 10px 20px;
  font: 14px/22px "Lato", Arial, sans-serif;
  margin-bottom: 10px;
  border-radius: 5px;
  resize: none;
}
.chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
  font-size: 16px;
  color: gray;
  cursor: pointer;
}
.chat .chat-message button {
    float: right;
    color: #69aceb;
    font-size: 16px;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    font-weight: bold;
    background: #f4f3ef;
    width: 10%;
    height: 86px;
    border-radius: 7px;
}
.chat .chat-message button:hover {
  color: #75b1e8;
}

.online, .offline, .me {
  margin-right: 3px;
  font-size: 10px;
}

.online {
  color: #86BB71;
}

.offline {
  color: #E38968;
}



.User:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}
.Bot[data-v-25f52994]:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

</style>