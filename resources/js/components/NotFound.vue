<template>
  <div class="not-found-page">
    <div class="not-found-content">
      <span class="not-found-code">404</span>
      <p class="not-found-message">Page not found.</p>
      <router-link to="/" class="back-link">Back Home</router-link>
    </div>
  </div>
</template>

<style scoped>
.not-found-page {
  min-height: 100vh;
  width: 100vw;
  background: linear-gradient(135deg, #c5bdff 0%, #5463c1 100%);
  background: circlegradient(135deg, #c5bdff 0%, #5463c1 100%);
  display: flex;
  align-items: center;
  justify-content: center;
}
.not-found-content {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.06);
  padding: 48px 32px;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-width: 300px;
}
.not-found-code {
  font-size: 3.5rem;
  font-weight: 700;
  color: #e74c3c;
  margin-bottom: 10px;
  letter-spacing: 2px;
}
.not-found-message {
  font-size: 1.15rem;
  margin-bottom: 22px;
  font-weight: 400;
  color: #555;
}
.back-link {
  color: #e74c3c;
  text-decoration: underline;
  font-size: 1rem;
  border: none;
  background: none;
  padding: 0;
  cursor: pointer;
  transition: color 0.2s;
}
.back-link:hover {
  color: #222;
}
</style>