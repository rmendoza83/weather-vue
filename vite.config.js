import { defineConfig, splitVendorChunkPlugin } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import Components from "unplugin-vue-components/vite";
import { BootstrapVue3Resolver } from "unplugin-vue-components/resolvers";

export default defineConfig({
  plugins: [
    splitVendorChunkPlugin(),
    laravel({
      input: ["resources/sass/app.scss", "resources/js/app.ts"],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
    Components({
      resolvers: [BootstrapVue3Resolver()],
    }),
  ],
  resolve: {
    alias: [
      {
        find: /~(.+)/,
        replacement: `${process.cwd()}/node_modules/$1`,
      },
      {
        find: "vue",
        replacement: "vue/dist/vue.esm-bundler",
      },
    ],
  },
});
