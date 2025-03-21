<template>
  <div>
    <header>
      <div class="header-container">
        <h2 class="site-title">
          <Link href="/">小説投稿サイト</Link>
        </h2>
        <nav>
          <ul>
            <li>
              <Link href="/register">新規登録</Link>
            </li>
            <li>
              <Link href="/">プロフィール</Link>
            </li>
            <li>
              <Link href="/">ユーザーホーム</Link>
            </li>
            <li>
              <Link :href="route('logout')" method="post" class="link">ログアウト</Link>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="line"></div>

    <!-- フラッシュメッセージ & エラーメッセージ -->
    <div v-if="errors.length > 0" class="error">
      <ul>
        <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
      </ul>
    </div>

    <div v-if="message" class="message">
      {{ message }}
    </div>

    <!-- 各ページのコンテンツ -->
    <div class="main-wrapper">
      <slot />
    </div>

    <div class="line"></div>

    <!-- フッター -->
    <footer>
      <div class="footer-container">
        <h3>フッターです</h3>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';

// Laravelからのエラーメッセージ・フラッシュメッセージを取得
const page = usePage();
const errors = page.props.errors || [];
const message = page.props.flash?.message || '';

onMounted(() => {
  document.documentElement.classList.remove('dark');
});
</script>

<style>
:root {
  --black: rgb(67, 67, 67);
}
</style>

<style scoped>
.main-wrapper {
  width: 100%;
  background-color: rgb(233,229,222);
  min-height: 65vh;
}

header {
  display: flex;
  justify-content: center;
  background-color: var(--black);
  padding: 0 4%;
  height: 120px;
}

.header-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 960px;
  width: 100%;
}

.site-title a {
  color: rgb(195, 195, 195);
  font-weight: 100;
  font-size: 22px;
}

nav ul {
  display: flex;
  padding: 10px 0;
  align-items: center;
}

nav ul li {
  font-size: 1.1rem;
  margin-left: 2.4dvw;
  list-style: none;
}

nav ul li a {
  color: rgb(195, 195, 195);
}

.link {
color: rgb(195, 195, 195);
}

.line {
  height: 40px;
  background-color: rgb(129, 129, 129);
}

.error,
.message {
  position: absolute;
  top: 200px;
  left: 50%;
  transform: translateX(-50%);
  background-color: var(--black);
  color: rgb(233, 229, 222);
  text-align: center;
  padding: 16px;
  border-radius: 8px;
  width: 40%;
}

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

@media screen and (max-width: 600px) {
  .site-title {
    margin-top: 20px;
  }

  header {
    flex-direction: column;
    height: auto;
  }
}
</style>
