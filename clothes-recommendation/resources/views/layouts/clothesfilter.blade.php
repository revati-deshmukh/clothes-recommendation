<style>
    .product-filter {
        display: flex;
    }

    .product-filter h1 {
        flex-grow: 1;
    }

    .sort {
        display: flex;
    }

    .collection-sort {
        display: flex;
        flex-direction: column;
    }
</style>
@section('clothesfilter')

<nav class="product-filter">
    <h1>Clothes</h1>
    <div class="sort">
        <div class="collection-sort">
            <label>Filter by:</label>
            <select>
            <option value="/">All Clothes</option>
            </select>
        </div>

        <div class="collection-sort">
            <label>Sort by:</label>
            <select>
            <option value="/">Featured</option>
            </select>
        </div>
    </div>
</nav>

@endsection