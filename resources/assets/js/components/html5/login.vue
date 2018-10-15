<template>
    <van-cell-group>
        <van-nav-bar
                title="用户登录"
                left-text="返回"
                right-text="..."
                left-arrow
                @click-left="onClickLeft"
                @click-right=""
        />
        <van-field
                v-model="from_data.mobile"
                clearable
                label="手机号码"
                icon="question"
                placeholder="请输入手机号码"
                error-message=""
                @click-icon="$toast('请输入13位手机号码')"
        />
        <van-field
                v-model="from_data.password"
                clearable
                type="password"
                label="密码"
                placeholder="请输入6位数字密码"
                icon="question"
                @click-icon="$toast('请输入6位数密码')"
        />

        <van-field
                v-model="from_data.smsCode"
                center
                clearable
                label="短信验证码"
                placeholder="请输入短信验证码"
        >
            <van-button slot="button" size="small" type="primary">发送验证码</van-button>
        </van-field>
        <van-button size="large">登录</van-button>
    </van-cell-group>
</template>

<script>
    export default {
        data(){
            return {
                from_data : {
                    mobile : '',
                    password : '',
                    smsCode : ''
                }
            }

        },
        name: "login",
        methods : {
            onClickLeft() {
                window.history.back();
            },
        }
    }
</script>

<style scoped>

</style>