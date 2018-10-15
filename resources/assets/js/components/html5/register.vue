<template>
    <van-cell-group>
        <van-nav-bar
                title="用户注册"
                left-text="返回"
                right-text="..."
                left-arrow
                @click-left=""
                @click-right=""
        />

        <van-field
                v-model="username"
                required
                clearable
                label="用户手机号码"
                icon="question"
                placeholder="请输入用户手机号码"
                @click-icon="$toast('请输入用户手机号码')"
        />

        <van-field
                v-model="password"
                type="password"
                label="密码"
                placeholder="请输入密码"
                required
        />

        <van-field
                v-model="password"
                type="password"
                label="重复密码"
                placeholder="请输入密码"
                required
        />

        <van-field
                required
                v-model="smsCode"
                center
                clearable
                label="短信验证码"
                placeholder="请输入短信验证码"
        >
            <van-button slot="button" size="small" type="primary">发送验证码</van-button>
        </van-field>
        <van-button block round size="large">注册</van-button>
    </van-cell-group>
</template>

<script>
    export default {
        name: "Register",

    }
</script>

<style scoped>
    .van-cell-group {

    }
    .van-button {
        height: 48px;
        background-color: #9b8a30;
    }
</style>