<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Show all listings
     */
    public function all()
    {
        // alternatively use the Request $request parameter. Note this doesn't need to be passed as an argument
        return view('listings.all', [
            // 'listings' => Listing::all()
            // this sorts according to time in descending order
            // simplePaginate() shows just next and previous buttons
            // paginate() shows full pagination
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
        // we impose a limit on number of records that are fetched, by using paginate() in place of get(). This way, we can get to the next and previous data by their page number
    }

    /**
     * Get single listing
     */
    function find(Listing $listing)
    {
        return view('listings.find', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    /**
     * Create new listing
     */
    public function store(Request $request)
    {

        // get file from the request object using the file method and store using the store() method

        // get request body and validate
        $form = $request->validate([
            'company' => [
                'required',
                Rule::unique('listings', 'company')
            ],
            'title' => ['required'],
            'location' => ['required'],
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => ['required'],
            'logo' => ['image'],
            'description' => ['required']
        ]);

        // we made the files publicly available connecting the storage to the public folder using: php artisan storage:link
        // check if a file with name logo was passed
        if ($request->hasFile('logo')) {
            // specify it is stored in the logos folder in the public folder. If the folder doesn't exist, it will be created. We store in public because we changed the file systems
            $form['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $form['user_id'] = auth()->id();

        // calls the model create if no errors
        Listing::create($form);

        // create a flash message. Alternatively pass the message with the redirect
        // Session::flash('message', 'Listing created successfully');

        return redirect('/')->with('message', 'Listing created successfully');
    }

    /**
     * Update listing
     */
    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id != auth()->id())
            abort(403, 'Unauthorised action');

        // get file from the request object using the file method and store using the store() method

        // get request body and validate
        $form = $request->validate([
            'company' => ['required',],
            'title' => ['required'],
            'location' => ['required'],
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => ['required'],
            'logo' => ['image'],
            'description' => ['required']
        ]);

        // we made the files publicly available connecting the storage to the public folder using: php artisan storage:link
        // check if a file with name logo was passed
        if ($request->hasFile('logo')) {
            // specify it is stored in the logos folder in the public folder. If the folder doesn't exist, it will be created. We store in public because we changed the file systems
            $form['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // edits this listing
        $listing->update($form);

        // back() goes to the previous page
        return redirect("/listings/{$listing->id}")->with('message', 'Listing edited successfully');
    }

    /**
     * Show edit form
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Delete listing
     */
    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id())
            abort(403, 'Unauthorised action');
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
