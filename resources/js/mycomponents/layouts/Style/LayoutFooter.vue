<script setup></script>

<template>
  <footer>
    <div class="footer-container">
      <h3>フッターです</h3>
    </div>
  </footer>
</template>

<style scoped>
footer {
  display: flex;
  justify-content: center;
  background-color: var(--black);
  padding: 0 4%;
  height: 120px;
  color: rgb(190, 190, 190);
}

footer-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 960px;
  width: 100%;
}
</style>
