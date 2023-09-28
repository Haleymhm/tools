<template>
  <q-page class="q-pa-md">
    <q-form @submit="submitForm">
      <q-card class="my-card" flat bordered>

        <q-card-section>
          <div class="container text-center">
            <div class="row">
              <q-input
                outlined
                v-model="formCompany.company_rutrif"
                label="Rut"
                class="col-xs-12 col-sm-6 col-md-4 q-pa-xs"
                mask="########-#"
                placeholder="ej: 12345678-9"
              />
              <q-input
                outlined
                v-model="formCompany.company_name"
                label="Nombre"
                class="col-xs-12 col-sm-6 col-md-8 q-pa-xs"
              />
            </div>
            <div class="row">
              <q-input
                outlined
                v-model="formCompany.company_address"
                label="Dirección"
                class="col-xs-12 col-sm-12 col-md-12 q-pa-xs"
              />
              <q-input
                outlined
                v-model="formCompany.company_email"
                label="Correo"
                class="col-xs-12 col-sm-6 col-md-8 q-pa-xs"
              />
              <q-input
                outlined
                v-model="formCompany.company_telephone"
                label="Teléfono"
                class="col-xs-12 col-sm-6 col-md-4 q-pa-xs"
              />
            </div>
            <div class="row">
              <q-uploader
                v-model="formCompany.company_logo"
                label="Logo de la empresa"
                extensions="jpg, png, gif"
                class="col-7 q-pa-xs"
              />
              <div class="col-2 q-pa-xs">&nbsp;</div>
              <q-img
                :src="formCompany.url"
                spinner-color="white"
                style="height: 250px; max-width: 250px; text-align: right"
                class="col-4 q-pa-xs"
              />
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn
            type="button"
            label="Volver"
            class="col-xs-12 col-md-2"
            :on-click="goToBack()"
          />
          <q-btn
            type="submit"
            label="Guardar"
            class="col-xs-12 col-md-2"
            color="primary"
          />
        </q-card-actions>
      </q-card>
    </q-form>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
  name: "CompanyPage",
  data() {
    return {
      formCompany: {
        id: "",
        company_rutrif: "",
        company_name: "",
        company_address: "",
        company_email: "",
        company_telephone: "",
        company_logo: null,
        url: "https://coffee.alexflipnote.dev/gqV69AXXtwY_coffee.png",
      },
    };
  },
  mounted() {
    this.loadData();
  },
  methods: {
    async loadData() {
      let data = { id: "9a2e095b-0916-4d82-b0e1-c7479cb40875" };
      const res = await axios.post(
        "http://api.mytool.test/api/company/get-data",
        data
      );

      this.formCompany.id = res.data.response.id;
      this.formCompany.company_rutrif = res.data.response.company_rutrif;
      this.formCompany.company_name = res.data.response.company_name;
      this.formCompany.company_address = res.data.response.company_address;
      this.company_telephone = res.data.response.company_telephone;
      this.formCompany.company_email = res.data.response.company_email;
      this.formCompany.company_logo = res.data.response.company_logo;
    },
    submitForm() {

      axios
        .post("http://api.mytool.test/api/company/company-update", this.formCompany)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    goToBack() {
      //window.location.replace('#/home');
    },
  },
});
</script>

<style lang="sass" scoped>
.my-card
  width: 100%,
  align: center
</style>
