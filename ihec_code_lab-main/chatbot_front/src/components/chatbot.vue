<template>
    <div>
      <!-- Floating Chatbot Button -->
      <v-btn 
        icon 
        color="primary" 
        class="chatbot-trigger" 
        @click="toggleChatbot"
      >
        <v-icon>mdi-chat-outline</v-icon>
      </v-btn>
  
      <!-- Chatbot Sidebar -->
      <v-navigation-drawer 
        v-model="chatbotOpen"
        location="right"
        width="500"
        class="chatbot-drawer"
      >
        <v-layout full-height>
          <!-- Sidebar Content -->
          <v-navigation-drawer 
            v-model="chatbotOpen" 
            permanent 
            width="80" 
            class="side-menu"
          >
            <v-list dense>
              <v-list-item 
                @click="createNewChat" 
                class="my-2"
              >
                <v-icon>mdi-plus</v-icon>
              </v-list-item>
              <v-divider></v-divider>
              <v-list-item 
                v-for="(chat, index) in chatHistory" 
                :key="index"
                @click="selectChat(index)"
                class="my-2"
              >
                <v-icon>mdi-chat-processing</v-icon>
              </v-list-item>
            </v-list>
          </v-navigation-drawer>
  
          <!-- Main Chat Area -->
          <v-main class="chat-main">
            <v-container fluid class="fill-height">
              <v-row no-gutters class="fill-height">
                <v-col class="d-flex flex-column">
                  <!-- Chat Header -->
                  <v-toolbar 
                    color="primary" 
                    dark 
                    class="chat-header"
                  >
                    <v-toolbar-title class="font-weight-bold">IHEC Assistant</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn 
                      icon 
                      @click="chatbotOpen = false"
                      color="primary"
                    >
                      <v-icon>mdi-close</v-icon>
                    </v-btn>
                  </v-toolbar>
  
                  <!-- Messages Container -->
                  <v-card-text 
                    class="chat-messages flex-grow-1 overflow-y-auto"
                  >
                    <template v-for="(group, date) in groupedMessages">
                      <v-divider class="my-3">
                        <span class="date-divider">{{ formatDate(date) }}</span>
                      </v-divider>
                      <v-list>
                        <v-list-item 
                          v-for="(message, index) in group" 
                          :key="index"
                          class="message"
                          :class="{
                            'user-message': message.type === 'user',
                            'bot-message': message.type === 'bot'
                          }"
                        >
                          {{ message.text }}
                        </v-list-item>
                       
                      </v-list>
                    </template>
                  </v-card-text>
                  <v-footer class="chat-input-area pa-3">
                    <v-textarea
                      v-model="userInput"
                      placeholder="Posez votre question..."
                      variant="outlined"
                      rows="1"
                      auto-grow
                      density="comfortable"
                      hide-details
                      class="mr-2 flex-grow-1"
                    >
                      <template v-slot:append-inner>
                        <v-btn 
                          style="padding:5px ;"
                          icon 
                          @click="sendMessage"
                          color="primary"
                          :disabled="!userInput.trim()"
                        >
                          <v-icon>mdi-send</v-icon>
                        </v-btn>
                      </template>
                    </v-textarea>
                  </v-footer>
                </v-col>
              </v-row>
            </v-container>
          </v-main>
        </v-layout>
      </v-navigation-drawer>
    </div>
  </template>
  
  <script>
  import chatbotService from '../services/chatbotService.js';
  
  export default {
    data() {
      return {
        chatbotOpen: false,
        userInput: '',
        chatHistory: [
          { 
            id: 1, 
            messages: [
              { 
                text: "", 
                type: 'bot',
                timestamp: new Date() 
              }
            ] 
          }
        ],
        currentChat: null,
        bot_chat :""
      };
    },
    computed: {
      // Group messages by date
      groupedMessages() {
        const grouped = {};
        this.currentChat.messages.forEach(message => {
          const date = message.timestamp.toISOString().split('T')[0];
          if (!grouped[date]) {
            grouped[date] = [];
          }
          grouped[date].push(message);
        });
        return grouped;
      },
    },
    methods: {
      toggleChatbot() {
        this.chatbotOpen = !this.chatbotOpen;
      },
      createNewChat() {
        const newChat = { 
          id: this.chatHistory.length + 1, 
          messages: [
            { 
              text: "Nouveau chat. Comment puis-je vous aider?", 
              type: 'bot',
              timestamp: new Date() 
            }
          ] 
        };
        this.chatHistory.push(newChat);
        this.currentChat = newChat;
      },
      selectChat(index) {
        this.currentChat = this.chatHistory[index];
      },
      async sendMessage() {
        if (!this.userInput.trim()) return;
  
        // Add user message
        this.currentChat.messages.push({ 
          text: this.userInput, 
          type: 'user',
          timestamp: new Date()
        });
  
        try{
          const response = await chatbotService.sendText(this.userInput);
          console.log(response.data.response);
          this.bot_chat = response.data.response; 
          this.currentChat.messages.push({
          text:this.bot_chat || 'i dont know',
          type: 'bot',
          timestamp: new Date()
        });
  
        // Clear input
        this.userInput = '';
        }
        catch(error){
          console.log("Erreur lors de la récupération des données: ",error);
        }
      },
      formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', {
          weekday: 'long',
          year: 'numeric',
          month: 'long',
          day: 'numeric'
        });
      },
    },
    created() {
      this.currentChat = this.chatHistory[0];
    },
  };
  </script>
  
  <style scoped>
  :root {
    /* IHEC Carthage Tunis color palette */
    --primary-color: #00356B;  /* Deep blue */
    --secondary-color: #C4122E;  /* Crimson red */
    --background-color: #F4F4F4;
  }
  
  .chatbot-trigger {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
    
  }
  
  .chatbot-drawer {
    background-color: var(--background-color);
    font-family: 'Arial', sans-serif;
  
    height: 40%; /* Définit une hauteur spécifique */
    overflow-y: auto; /* Ajoute un défilement si nécessaire */
  }
  
  .side-menu {
    background-color: #e0e0e0;
    border-right: 1px solid #c0c0c0;
  }
  
  .chat-main {
    background-color: white;
  }
  
  .chat-header {
    background-color: var(--primary-color) !important;
    color: white !important;
  }
  
  .date-divider {
    background-color: var(--background-color);
    color: var(--primary-color);
    padding: 0 10px;
    font-weight: bold;
  }
  
  .message {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 8px;
    max-width: 80%;
    font-size: 0.9rem;
  }
  
  .user-message {
    background-color: rgb(0, 162, 255);
    align-self: flex-end;
    margin-left: auto;
  }
  
  .bot-message {
    background-color: #f0f0f0;
    color: #333;
    align-self: flex-start;
  }
  
  .chat-input-area {
    border-top: 1px solid #e0e0e0;
    padding: 10px;
    position: relative;
    top: 80px;
  }
  </style>