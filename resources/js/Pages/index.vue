<template>
  <div>
    <navbar @event-show-modal="showModal"> </navbar>
    <div class="row justify-content-center">
      <div class="col-8">
        <table-component :items="items" @event-table-delete="deleteEntry" @event-table-edite="editeEntry"></table-component>
      </div>
    </div>

    <b-modal id="bv-modal-example" hide-footer>
      <template #modal-title>Novo Cadastro</template>
      <b-form>
        <input id="index" v-model="form.index" type="hidden" name="index" />

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

        <b-form-group v-if="legal_person == false" id="input-group-2" label="CPF" label-for="cpf">
          <b-form-input id="cpf" required v-model="form.cpf"></b-form-input>
        </b-form-group>
        <b-form-group v-else id="input-group-2" label="CNPJ" label-for="cnpj">
          <b-form-input id="cnpj" required v-model="form.cnpj"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-4">
          <b-form-checkbox-group id="checkboxes-4">
            <b-form-checkbox value="false" id="legal_preson" v-model="legal_person" checked>Pessoa jurídica</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>

        <b-button v-if="actionButton === 'Cadastrar'" type="submit" variant="primary" v-on:click="onSubmit">Submit</b-button>
        <b-button v-else type="submit" variant="primary" v-on:click="confirmEditeEntry">Salvar</b-button>
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
        fullName: "",
        index: "",
        first_name: "",
        last_name: "",
        email: "",
        phone: "",
        cpf: "",
        cnpj: "",
        fullName: "",
      },
      items: [],
      actionButton: "Cadastrar",
      legal_person: false,
    };
  },
  mounted() {
    console.log(this.fullName);
  },
  methods: {
    showModal() {
      this.form.first_name = "";
      this.form.last_name = "";
      this.form.email = "";
      this.form.phone = "";
      this.form.cpf = "";
      this.form.cnpj = "";
      this.$root.$emit("bv::show::modal", "bv-modal-example");
      this.actionButton = "Cadastrar";
    },
    onSubmit: function (evt) {
      evt.preventDefault();
      if (this.legal_person == false) {
        this.form.cnpj = "";
      } else {
        this.form.cpf = "";
      }
      var my_object = {
        fullName: this.fullName,
        first_name: this.form.first_name,
        last_name: this.form.last_name,
        email: this.form.email,
        phone: this.form.phone,
        cpf: this.form.cpf,
        cnpj: this.form.cnpj,
        id: Date.now(),
      };
      this.items.push(my_object);
      this.$root.$emit("bv::hide::modal", "bv-modal-example");
      console.log(this.items);
    },
    deleteEntry(index) {
      if (confirm("Você realmente que deletar isso?")) {
        this.items.splice(index);
      }
    },
    editeEntry(index) {
      console.log(this.legal_person);
      if (this.items[index].cnpj != "") {
        this.legal_person = true;
      } else {
        this.legal_person = false;
      }
      this.actionButton = "Editar";
      this.form.index = index;
      this.form.first_name = this.items[index].first_name;
      this.form.last_name = this.items[index].last_name;
      this.form.email = this.items[index].email;
      this.form.phone = this.items[index].phone;
      this.form.cpf = this.items[index].cpf;
      this.form.cnpj = this.items[index].cnpj;
      this.$root.$emit("bv::show::modal", "bv-modal-example");
    },
    confirmEditeEntry(evt) {
      evt.preventDefault();
      if (confirm("Salvar mudanças?")) {
        console.log(this.fullName);
        console.log(this.fullName);

        if (this.legal_person == false) {
          this.form.cnpj = "";
        } else {
          this.form.cpf = "";
        }
        var newValue = {
          fullName: this.fullName,
          first_name: this.form.first_name,
          last_name: this.form.last_name,
          email: this.form.email,
          phone: this.form.phone,
          cpf: this.form.cpf,
          cnpj: this.form.cnpj,
        };
        console.log(newValue);
        Vue.set(this.items, this.form.index, newValue);
        console.log(this.items);
        this.$root.$emit("bv::hide::modal", "bv-modal-example");
      }
    },
  },
  components: {
    TableComponent,
  },
  computed: {
    fullName: function () {
      return this.form.first_name + " " + this.form.last_name;
    },
  },
  watch: {
    legal_person(value) {
      !this.legal_person[0];
    },
  },
};
</script>
