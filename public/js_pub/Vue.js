const app = Vue.createApp({
    data() {
      return {
        show: "1",
      };
    },
    methods: {
      select: function (num) {
        this.show = num;
      },
    },
  });
  app.mount("#Vue_1");