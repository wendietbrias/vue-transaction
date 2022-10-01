import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "Auth",
      component: () => import("../views/Auth.vue"),
    },
  ],
});

export default router;
