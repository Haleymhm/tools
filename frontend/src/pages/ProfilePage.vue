<template>
  <q-page class="q-pa-md">
    <q-form @submit="submitForm">
      <q-card class="my-card" flat bordered>
        <q-card-section>
          <div class="text-h6">Perfil de Usuario</div>
        </q-card-section>
        <q-card-section>
          <div class="container text-center">
            <div class="row">
              <q-input outlined v-model="nombre" label="Nombre" class="col-xs-12 col-sm-6 col-md-8 q-pa-xs" />
              <q-input outlined v-model="rut" label="Rut" class="col-xs-12 col-sm-6 col-md-4 q-pa-xs" mask="########-#" placeholder="ej: 12345678-9"/>
            </div>
            <div class="row">
              <q-input outlined v-model="correo" label="Correo" class="col-xs-12 col-sm-6 col-md-8 q-pa-xs" />
              <q-input outlined v-model="telefono" label="Teléfono" class="col-xs-12 col-sm-6 col-md-4 q-pa-xs" />
            </div>
            <div class="row">
              <q-input outlined v-model="password" label="Cambiar Password" :type="isPwd ? 'password' : 'text'" hint="Password with toggle" class="col-xs-12 col-sm-6 col-md-4 q-pa-xs">
                <template v-slot:append>
                  <q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer"
                    @click="isPwd = !isPwd" />
                </template>
              </q-input>
            </div>
            <div class="row">
              <q-uploader v-model="photo" label="Foto perfil" extensions="jpg, png, gif" class="col-12 q-pa-xs" />
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn type="button" label="Volver" class="col-xs-12 col-md-2" />
          <q-btn type="submit" label="Guardar" class="col-xs-12 col-md-2" color="primary" />
        </q-card-actions>
      </q-card>
    </q-form>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "ProfilePage",
  data() {
    return {
      rut: "",
      nombre: "",
      correo: "",
      telefono: "",
      photo: null,
      password: "",
      isPwd: true
    };
  },
  methods: {
    submitForm() {
      // Aquí puedes agregar la lógica para enviar el formulario
    }
  }
});
</script>
