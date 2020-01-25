<template>
    <div class="md-layout">
        <div class="md-layout-item">
            <md-card>
                <md-card-header class="md-card-header-icon md-card-header-green">
                    <div class="card-icon">
                        <md-icon>assignment</md-icon>
                    </div>
                    <h4 class="title">Organizaciones combatiendo el hambre</h4>
                </md-card-header>
                <md-card-content>
                    <md-table
                        :value="queriedData"
                        :md-sort.sync="currentSort"
                        :md-sort-order.sync="currentSortOrder"
                        :md-sort-fn="customSort"
                        class="paginated-table table-striped table-hover"
                        md-fixed-header
                    >
                        <md-table-toolbar>
                            <md-field>
                                <label for="pages">Por página</label>
                                <md-select v-model="pagination.perPage" name="pages">
                                    <md-option
                                        v-for="item in pagination.perPageOptions"
                                        :key="item"
                                        :label="item"
                                        :value="item"
                                    >
                                        {{ item }}
                                    </md-option>
                                </md-select>
                            </md-field>

                            <md-field>
                                <md-input
                                    type="search"
                                    class="mb-3"
                                    clearable
                                    style="width: 200px"
                                    placeholder="Buscar"
                                    v-model="searchQuery"
                                >
                                </md-input>
                            </md-field>
                        </md-table-toolbar>

                        <md-table-row slot="md-table-row" slot-scope="{ item }">
                            <md-table-cell md-label="Nombre" md-sort-by="name">{{
                                item.name
                                }}</md-table-cell>
                            <md-table-cell md-label="Ciudad" md-sort-by="email">{{
                                item.email
                                }}</md-table-cell>
                                <md-table-cell md-label="Calificación">
                                    <star-rating :rating="4.3" :read-only="true" :increment="0.1"/>
                            </md-table-cell>
                        </md-table-row>
                    </md-table>
                </md-card-content>
                <md-card-actions md-alignment="space-between">
                    <div class="">
                        <p class="card-category">
                            Showing {{ from + 1 }} to {{ to }} of {{ total }} entries
                        </p>
                    </div>
                    <pagination
                        class="pagination-no-border pagination-success"
                        v-model="pagination.currentPage"
                        :per-page="pagination.perPage"
                        :total="total"
                    >
                    </pagination>
                </md-card-actions>
            </md-card>
        </div>
    </div>
</template>

<script>
    import Pagination  from "../../components/Pagination";
    import Fuse from "fuse.js";
    import Swal from "sweetalert2";
    import StarRating from 'vue-star-rating';
    export default {
        components: {
            Pagination,
            StarRating
        },
        computed: {
            /***
             * Returns a page from the searched data or the whole data. Search is performed in the watch section below
             */
            queriedData() {
                let result = this.tableData;
                if (this.searchedData.length > 0) {
                    result = this.searchedData;
                }
                return result.slice(this.from, this.to);
            },
            to() {
                let highBound = this.from + this.pagination.perPage;
                if (this.total < highBound) {
                    highBound = this.total;
                }
                return highBound;
            },
            from() {
                return this.pagination.perPage * (this.pagination.currentPage - 1);
            },
            total() {
                return this.searchedData.length > 0
                    ? this.searchedData.length
                    : this.tableData.length;
            }
        },
        data() {
            return {
                currentSort: "name",
                currentSortOrder: "desc",
                pagination: {
                    perPage: 5,
                    currentPage: 1,
                    perPageOptions: [5, 10, 25, 50],
                    total: 0
                },
                searchQuery: "",
                config:{
                    starWidth: 15,
                    starHeight: 15,
                },
                propsToSearch: ["name", "email", "age"],
                tableData:   [{
                    id: 1,
                    name: "Noelia O'Kon",
                    nickname: "asperiores",
                    email: "otho.smitham@example.com",
                    salary: "13098.00",
                    age: 39
                },
            {
                id: 2,
                    name: "Mr. Enid Von PhD",
                nickname: "alias",
                email: "pollich.cecilia@example.com",
                salary: "35978.00",
                age: 26
            },
            {
                id: 3,
                    name: "Colton Koch",
                nickname: "id",
                email: "little.myrna@example.net",
                salary: "26278.00",
                age: 48
            },
            {
                id: 4,
                    name: "Gregory Vandervort",
                nickname: "vel",
                email: "dock47@example.org",
                salary: "25537.00",
                age: 27
            },
            {
                id: 5,
                    name: "Miss Rahsaan Heaney IV",
                nickname: "qui",
                email: "ugrady@example.org",
                salary: "49003.00",
                age: 21
            },
            {
                id: 6,
                    name: "Ms. Crystel Zemlak IV",
                nickname: "reiciendis",
                email: "amari.rau@example.com",
                salary: "12383.00",
                age: 48
            },
            {
                id: 7,
                    name: "Nona McDermott",
                nickname: "quaerat",
                email: "adrien.baumbach@example.org",
                salary: "18512.00",
                age: 31
            },
            {
                id: 8,
                    name: "Miss Genoveva Murazik V",
                nickname: "rerum",
                email: "ohettinger@example.net",
                salary: "31209.00",
                age: 28
            },
            {
                id: 9,
                    name: "Beulah Huels",
                nickname: "non",
                email: "stefan99@example.com",
                salary: "36920.00",
                age: 53
            },
            {
                id: 10,
                    name: "Zoe Klein",
                nickname: "ex",
                email: "ejacobson@example.org",
                salary: "35616.00",
                age: 27
            },
            {
                id: 11,
                    name: "Vickie Kiehn",
                nickname: "assumenda",
                email: "ayost@example.com",
                salary: "30790.00",
                age: 29
            },
            {
                id: 12,
                    name: "Elwyn Herzog",
                nickname: "praesentium",
                email: "ckassulke@example.net",
                salary: "35785.00",
                age: 27
            },
            {
                id: 13,
                    name: "Selena Hettinger",
                nickname: "et",
                email: "bashirian.hyman@example.net",
                salary: "31836.00",
                age: 35
            },
            {
                id: 14,
                    name: "Edwin Beier",
                nickname: "eos",
                email: "janis71@example.org",
                salary: "11902.00",
                age: 38
            },
            {
                id: 15,
                    name: "Lexi Braun MD",
                nickname: "autem",
                email: "dusty74@example.net",
                salary: "11927.00",
                age: 45
            },
            {
                id: 16,
                    name: "Jovany Spencer",
                nickname: "fugit",
                email: "gbogisich@example.org",
                salary: "44686.00",
                age: 43
            },
            {
                id: 17,
                    name: "Prof. Maci Anderson DVM",
                nickname: "dolorem",
                email: "btorp@example.com",
                salary: "25055.00",
                age: 29
            },
            {
                id: 18,
                    name: "Joel Kulas MD",
                nickname: "sed",
                email: "phoebe.sauer@example.org",
                salary: "11650.00",
                age: 24
            },
            {
                id: 19,
                    name: "Mr. Dawson Greenholt",
                nickname: "nostrum",
                email: "asawayn@example.org",
                salary: "46962.00",
                age: 53
            },
            {
                id: 20,
                    name: "Prof. Lloyd Green",
                nickname: "velit",
                email: "laila.hintz@example.org",
                salary: "12928.00",
                age: 46
            }],
                searchedData: [],
                fuseSearch: null
            };
        },
        methods: {
            customSort(value) {
                return value.sort((a, b) => {
                    const sortBy = this.currentSort;
                    if (this.currentSortOrder === "desc") {
                        return a[sortBy].localeCompare(b[sortBy]);
                    }
                    return b[sortBy].localeCompare(a[sortBy]);
                });
            },
            handleLike(item) {
                Swal.fire({
                    title: `You liked ${item.name}`,
                    buttonsStyling: false,
                    type: "success",
                    confirmButtonClass: "md-button md-success"
                });
            },
            handleEdit(item) {
                Swal.fire({
                    title: `You want to edit ${item.name}`,
                    buttonsStyling: false,
                    confirmButtonClass: "md-button md-info"
                });
            },
            handleDelete(item) {
                Swal.fire({
                    title: "Are you sure?",
                    text: `You won't be able to revert this!`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "md-button md-success btn-fill",
                    cancelButtonClass: "md-button md-danger btn-fill",
                    confirmButtonText: "Yes, delete it!",
                    buttonsStyling: false
                }).then(result => {
                    if (result.value) {
                        this.deleteRow(item);
                        Swal.fire({
                            title: "Deleted!",
                            text: `You deleted ${item.name}`,
                            type: "success",
                            confirmButtonClass: "md-button md-success btn-fill",
                            buttonsStyling: false
                        });
                    }
                });
            },
            deleteRow(item) {
                let indexToDelete = this.tableData.findIndex(
                    tableRow => tableRow.id === item.id
                );
                if (indexToDelete >= 0) {
                    this.tableData.splice(indexToDelete, 1);
                }
            }
        },
        mounted() {
            // Fuse search initialization.
            this.fuseSearch = new Fuse(this.tableData, {
                keys: ["name", "email"],
                threshold: 0.3
            });
        },
        watch: {
            /**
             * Searches through the table data by a given query.
             * NOTE: If you have a lot of data, it's recommended to do the search on the Server Side and only display the results here.
             * @param value of the query
             */
            searchQuery(value) {
                let result = this.tableData;
                if (value !== "") {
                    result = this.fuseSearch.search(this.searchQuery);
                }
                this.searchedData = result;
            }
        }
    };
</script>

<style lang="css" scoped>
    .md-card .md-card-actions{
        border: 0;
        margin-left: 20px;
        margin-right: 20px;
    }
</style>
