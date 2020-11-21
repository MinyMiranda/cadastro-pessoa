<template>
  <div>
    <navbar> </navbar>
    <div class="col-8">
      <table-component :items="items"></table-component>
    </div>
    <b-modal id="bv-modal-example" hide-footer>
      <template #modal-title>Novo Cadastro</template>
      <b-form @submit="onSubmit">
        <b-form-group id="input-group-1" label="Nome" label-for="first_name">
          <b-form-input id="first_name" type="text" required v-model="form.first_name"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="Sobrenome" label-for="last_name">
          <b-form-input id="last_name" type="text" required v-model="form.last_name"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-3" label="Email" label-for="email">
          <b-form-input id="email" type="email" required v-model="form.email"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-4" label="Telefone" label-for="phone">
          <b-form-input id="phone" type="text" required v-model="form.phone"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-2" label="CPF" label-for="cpf">
          <b-form-input id="cpf" required v-model="form.cpf"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-4">
          <b-form-checkbox-group id="checkboxes-4">
            <b-form-checkbox value="legal_person">Pessoa jurídica</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>

        <b-button type="submit" variant="primary">Submit</b-button>
      </b-form>
    </b-modal>
  </div>
</template>

<script>
import TableComponent from "../components/TableComponent.vue";

export default {
  data: function () {
    return {
      form: {
        first_name: "",
        last_name: "",
        email: "",
        phone: "",
        cpf: "",
      },
      items: [
      ],
    };
  },
  mounted() {
    console.log("nnn");
  },
  methods: {
    onSubmit: function (evt) {
      evt.preventDefault();
      var my_object = {
        first_name: this.form.first_name,
        last_name: this.form.last_name,
        email: this.form.email,
        phone: this.form.phone,
        cpf: this.form.cpf,
        id:Date.now,
      };
      this.items.push(my_object);
      this.form.first_name = "";
      this.form.last_name = "";
      this.form.email = "";
      this.form.phone = "";
      this.form.cpf = "";
    },
    deleteEntry(id, index) {
      console.log(id,index) 
      // return
      // if (confirm("Você realmente que deletar isso?")) {
      //  this.items.splice(2, 1);
      // }
    },
    editeEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/v1/companies/" + id)
          .then(function (resp) {
            app.companies.splice(index, 1);
          })
          .catch(function (resp) {
            alert("Could not delete company");
          });
      }
    },
  },
  components: {
    TableComponent,
  },
};
</script>
