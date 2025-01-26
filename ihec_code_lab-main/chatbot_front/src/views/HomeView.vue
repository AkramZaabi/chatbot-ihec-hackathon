<!-- <template>
  <!-- <navBar/> -->
  <!-- <chatbot /> -->
<!-- </template> -->

<!-- <script>
import { defineComponent } from "vue";

import chatbot from "../components/chatbot.vue";
// import navBar from "../components/Navbar.vue";

export default defineComponent({
  name: "HomeView",

  components: {
    chatbot,
    // navBar,
  },
});
</script> -->

<template>
  <div>
    <!-- Header Section -->
    <header class="header">
      <div class="logo">IHEC Carthage</div>
      <nav>
        <ul class="nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#programs">Programs</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero">
      <h1>Welcome to IHEC Carthage</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
      <section id="about" class="section">
        <h2>About Us</h2>
        <p>The Higher Institute of Business Studies (IHEC) is a leading institution providing quality education and fostering innovation.</p>
      </section>

      <section id="programs" class="section">
        <h2>Our Programs</h2>
        <p>We offer a variety of undergraduate and postgraduate programs designed to prepare students for the business world.</p>
      </section>

      <section id="contact" class="section">
        <h2>Contact Us</h2>
        <p>Address: IHEC Carthage, Tunisia</p>
        <p>Email: info@ihec.tn</p>
      </section>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
      <p>&copy; 2025 IHEC Carthage. All rights reserved.</p>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'HomePage',
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  color: #333;
}

.header {
  background: #003366;
  color: white;
  padding: 1rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 1rem;
}

.nav-links li a {
  color: white;
  text-decoration: none;
  padding: 0.5rem 1rem;
  transition: background 0.3s;
}

.nav-links li a:hover {
  background: #00509e;
  border-radius: 5px;
}

.hero {
  background: url('https://ihec.rnu.tn/assets/images/home-image.jpg') no-repeat center center/cover;
  color: white;
  height: 400px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.hero h1 {
  font-size: 2.5rem;
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}

.container {
  padding: 2rem;
}

.section {
  margin-bottom: 2rem;
}

.section h2 {
  color: #003366;
  margin-bottom: 1rem;
}

.section p {
  margin-bottom: 1rem;
}

.footer {
  background: #003366;
  color: white;
  text-align: center;
  padding: 1rem 0;
  margin-top: 2rem;
}
</style>



