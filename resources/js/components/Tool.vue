<template>
  <div>
    <heading class="mb-6">Spotify Auth</heading>

    <div class="flex">
      <span class="mb-6">
        <button
          class="btn btn-default btn-primary"
          @click="requestSpotifyRefreshToken"
        >
          Request Spotify Refresh Token
        </button>
      </span>
    </div>

    <card class="p-4">
      <p class="mb-4 font-bold">
        User ID:
      </p>

      <p style="overflow-wrap: break-word;">
        {{ userId }}
      </p>

      <br>

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
      userId: '',
    };
  },

  mounted() {
    this.getUserId();
    this.getRefreshToken();
  },

  methods: {
    async getRefreshToken() {
      ({ data: this.refreshToken } = await Nova.request().get('/nova-vendor/nova-spotify-auth-tool/refresh-token'));
    },

    async getUserId() {
      ({ data: this.userId } = await Nova.request().get('/nova-vendor/nova-spotify-auth-tool/user-id'));
    },

    requestSpotifyRefreshToken() {
      window.location.href = '/nova-vendor/nova-spotify-auth-tool/auth';
    },
  },
};
</script>
