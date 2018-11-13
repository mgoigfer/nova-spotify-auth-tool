<template>
  <div>
    <heading class="mb-6">Spotify Auth</heading>

    <div class="flex">
      <span class="mb-6">
        <button
          class="btn btn-default btn-primary"
          @click="requestSpotifyRefreshToken"
        >
          Obtener Spotify Refresh Token
        </button>
      </span>
    </div>

    <card class="p-4">
      <p class="mb-4 font-bold">
        Refresh Token:
      </p>

      <p style="overflow-wrap: break-word;">
        {{ refreshToken }}
      </p>
    </card>
  </div>
</template>

<script>
/* eslint global Nova */

export default {
  data() {
    return {
      refreshToken: '',
    };
  },

  mounted() {
    this.getRefreshToken();
  },

  methods: {
    async getRefreshToken() {
      ({ data: this.refreshToken } = await Nova.request().get('/nova-vendor/nova-spotify-auth-tool/refresh-token'));
    },

    requestSpotifyRefreshToken() {
      window.location.href = '/nova-vendor/nova-spotify-auth-tool/auth';
    },
  },
};
</script>
