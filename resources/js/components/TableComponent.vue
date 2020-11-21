<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">Cadastro de pessoas</div>
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th width="120">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items" :key="item.id">
              <td>{{ item.first_name + " " + item.last_name }}</td>
              <td>{{ item.email }}</td>
              <td>
                <div class="row">
                  <div class="col-6">
                    <b-button pill variant="primary" v-on:click="editeEntry(item.id)">
                      <b-icon icon="pencil" aria-hidden="true"></b-icon>
                    </b-button>
                  </div>
                  <div class="col-6">
                    <b-button pill variant="danger" v-on:click="deleteEntry(item.id)">
                      <b-icon icon="trash-fill" aria-hidden="true"></b-icon>
                    </b-button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import { BButton, BIcon } from "bootstrap-vue";
export default {
  props: {
    items: {
      type: Array,
      required: true,
    },
  },
  components: {
    BButton,
    BIcon,
  },
};
</script>
