import './bootstrap';
import {createApp} from 'vue'

import Index from './components/Index'
import router from "./router";
import ExampleComponent from "./components/ExampleComponent";

const app = createApp({

    components: {
        Index,
        ExampleComponent
    },

})
app.use(router)

app.mount('#app')
//
