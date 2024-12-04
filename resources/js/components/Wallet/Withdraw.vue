<template>
    <form class="card-background mt-4  p-2">
        <div class="mb-3 ">
            <label for="userBalance" class="col-12 col-form-label text-white">User Balance</label>
            <div class="form-control " id="userBalance"> 0.000</div>
        </div>
        <div class="mb-3">
            <label for="withdrawalAddress" class="col-12 col-form-label text-white">Withdrawal address</label>
            <select class="form-select " id="withdrawalAddress" name="withdrawalAddress" aria-label="Default select example">
                <option selected>Select your withdrawal address</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3 ">
            <label for="amount" class="col-12 col-form-label text-white">Withdrawal amount</label>
            <div class="webflow-style-input">
                <input  type="number" min="1" step="any" class="" id="amount" name="amount">
            </div>
            <div id="amount" class="form-text ">Fee : 0.3%</div>

        </div>
        <div class="mb-3">
            <label for="password" class="col-12 col-form-label text-white">Payment Password</label>
            <div class="webflow-style-input">
                <input type="password" class="" name="password" id="password">
            </div>
        </div>
        <button type="submit" class="menu-button my-4">Submit</button>
    </form>
</template>

<script>
export default {
    name: "Withdraw",
    data() {
        return {
            fields: {
                withdrawalAddress: {
                    label: "Withdrawal Address",
                    value: "",
                },
                amount: {
                    label: "Amount",
                    value: "",
                },
                password: {
                    label: "Password",
                    value: "",
                },
            },
            steps: [
                ["withdrawalAddress", "amount", "password"],
                ["", "", "", ""],
                [""]
            ]
        }
    },
}
</script>

<style>
</style>

