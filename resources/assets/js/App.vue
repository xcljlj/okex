<template>
    <div id="app">
        <appTemplate></appTemplate>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    import appTemplate from './components/layouts/vapp.vue';
  export default {
    name: 'app',
    components: {
        appTemplate,
    }
  };
</script>
