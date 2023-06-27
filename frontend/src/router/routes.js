const routes = [
  {
    path: "/login",
    component: () => import("pages/LoginPage.vue"),
  },
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "/home", component: () => import("pages/IndexPage.vue") },
      { path: "/company", component: () => import("pages/CompanyPage.vue")},
      { path: "/uniit", component: () => import("pages/UnitOperativePage.vue")},
      { path: "/tactivity", component: () => import("pages/TypeActivityPage.vue")},
      { path: "/user", component: () => import("pages/UserPage.vue") },
      { path: "/profile", component: () => import("pages/ProfilePage.vue")},
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
