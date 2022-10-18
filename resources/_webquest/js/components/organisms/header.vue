<template>
  <header>
    <div class="logo"></div>
    <div class="navbar">
      <ul>
        <li><app-link :link="'http://webquest.test/'">Home</app-link></li>
        <li><app-link :link="'http://webquest.test/'">Decouvrir</app-link></li>
        <li>
          <app-dropdown arrow :anchor="['top','left']" collapse>
              <template #title>
                <app-link :link="'http://webquest.test/'">
                  FAQ
                  <font-awesome-icon class="arrow" icon="fa-solid fa-angle-down" />
                </app-link>
              </template>
              <app-link :link="'http://webquest.test/'">ITEM 1</app-link>
              <app-link :link="'http://webquest.test/'">ITEM 2</app-link>
              <app-link :link="'http://webquest.test/'">ITEM 2</app-link>
              <app-link :link="'http://webquest.test/'">ITEM 2</app-link>
          </app-dropdown>
        </li>
      </ul>
      <ul v-if="!logged">
        <app-link :link="'http://webquest.test/'">Login</app-link>
        <app-link :link="'http://webquest.test/'">Register</app-link>
      </ul>
      <ul v-if="logged">
        <app-link :link="'http://webquest.test/'">Workshop</app-link>
        <app-link :link="'http://webquest.test/'">Atelier</app-link>
        <app-dropdown :link="'http://webquest.test/'">Profil</app-dropdown>
      </ul>
    </div>
  </header>
</template>

<script>
  export default {
    props: {
      logged: {
        type: Boolean,
        required: false,
        default: false,
      }
    }
  }
</script>

<style lang="scss" scoped>
  header{
    position: relative;
    width: 100%;
    background-image: var(--navbarBackgroundImage);
    background-size: cover;
    background-position-y: 50%;
    color: var(--colorTextLight);

    &:before{
      content: ' ';
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 1;
      background-color: var(--navbarBackgroundEmphase);
    }

    .logo{
      position: absolute;
      top: -1px; left: 0;
      width: 135px;
      height: 100%;
      z-index: 3;
      background-image: var(--navbarLogo);
      background-size: cover;
      background-position: center;
    }

    .navbar{
      position: relative;
      width: 100%;
      height: 100%;
      z-index: 3;
      padding: 0 60px 0 155px;
      display: flex;
      flex-flow: row;
      justify-content: space-between;

      font-family: var(--font-navbar);
      font-size: 22px;
      font-weight: 300;
      line-height: 80px;
      text-align: center;

    .arrow{
        margin: 0 10px;
      }

      ul{
        display: flex;
        flex-flow: row nowrap;
        justify-content: flex-start;
        align-items: center;

        &:last-child{
          justify-content: flex-end;
        }

        > *{
          margin: 0 20px;
        }
      }
    }
  }
</style>